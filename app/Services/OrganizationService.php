<?php

namespace App\Services;

use App\Models\Api\Requests\AddressRequest;
use App\Models\Organization;
use App\Models\SocialAccount;
use App\Models\SocialAccountType;
use App\Http\Requests\Validator\StoreOrganizationRequest;
use App\Models\Address;
use App\Models\Api\Requests\OrganizationRequest;
use App\Models\Api\Requests\SocialAccountRequest;

class OrganizationService
{
    /**
     * @var StoreOrganizationRequest
     *
     * @return OrganizationRequest
     */
    public function createOrgRequestFromOrgValidationRequest(StoreOrganizationRequest $request)
    {
        $orgApiRequest = new OrganizationRequest();
        $orgApiRequest->name = $request->org['name'];
        $orgApiRequest->description = $request->org['description'];
        $orgApiRequest->website = $request->org['website'];
        $orgApiRequest->email = $request->org['email'];
        $orgApiRequest->phone = $request->org['phone'];

        $addressApiRequest = $this->createOrganizationAddressRequest($request);
        $addressApiRequest->primary = 1;
        $orgApiRequest->addresses[] = $addressApiRequest;

        $orgApiRequest->socialAccounts = $this->createOrganizationSocialAccounts($request);

        return $orgApiRequest;
    }

    /**
     * @return Organization
     */
    public function createOrganization(OrganizationRequest $request)
    {
        $org = Organization::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $addresses = $request->addresses;
        if (!empty($addresses)) {
            foreach ($addresses as $address) {
                $address = Address::create([
                    'address_line_one' => $address->address1,
                    'address_line_two' => $address->address2,
                    'city' => $address->city,
                    'state' => $address->state,
                    'zipcode' => $address->zip5,
                ]);

                $org->address()->associate($address->id)->save();
            }
        }

        foreach ($request->socialAccounts as $socialAccountRequest) {
            $accountType = SocialAccountType::where('name', $socialAccountRequest->accountType)->first();
            $account = SocialAccount::create([
                'handle' => $socialAccountRequest->handle,
            ]);

            $account->socialAccountType()->associate($accountType)->save();
            $org->socialAccounts()->attach($account->id, ['active' => 1]);
        }

        return $org;
    }

    /**
     * @var AddressRequest
     */
    protected function createOrganizationAddressRequest(StoreOrganizationRequest $request)
    {
        $addressApiRequest = new AddressRequest();
        $addressApiRequest->address1 = $request->address['address1'];
        $addressApiRequest->address2 = $request->address['address2'];
        $addressApiRequest->city = $request->address['city'];
        $addressApiRequest->state = $request->address['state'];
        $addressApiRequest->zip5 = $request->address['zip'];
        $addressApiRequest->tableType = 'Organization';

        return $addressApiRequest;
    }

    /**
     * @var SocialAddountsRequest[]
     */
    protected function createOrganizationSocialAccounts(StoreOrganizationRequest $request)
    {
        $socialAccounts = [];
        foreach ($request->social as $key => $handle) {
            if (empty($handle)) {
                continue;
            }

            $socialAccountRequest = new SocialAccountRequest();
            $socialAccountRequest->handle = $handle;
            $socialAccountRequest->accountType = $key;
            $socialAccounts[] = $socialAccountRequest;
        }

        return $socialAccounts;
    }
}
