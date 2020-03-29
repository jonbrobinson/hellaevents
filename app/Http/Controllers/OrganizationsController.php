<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validator\StoreOrganizationRequest;
use App\Models\Organization;
use App\Models\SocialAccountType;
use App\Services\OrganizationService;
use Illuminate\Database\QueryException;

class OrganizationsController extends Controller
{
    /**
     * @var OrganizationService
     */
    protected $_organizationService;

    public function __construct(OrganizationService $orgService)
    {
        $this->_organizationService = $orgService;
    }

    public function index()
    {
        $organizations = Organization::all();

        return view('pages.organizations.organizations_index', compact('organizations'));
    }

    public function create()
    {
        $accounts = SocialAccountType::all();

        return view('pages.organizations.organizations_create', compact('accounts'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        $orgApiRequest = $this->_organizationService->CreateOrgRequestFromOrgValidationRequest($request);

        try {
            $organization = $this->_organizationService->CreateOrganization($orgApiRequest);
        } catch (QueryException $qe) {
            return redirect()->back()
                ->withErrors([
                    'query' => $qe->getMessage(),
                ])->withInput();
        }

        return redirect()->action('OrganizationsController@show', ['id' => $organization->id]);
    }

    public function show($id)
    {
        $organization = Organization::find($id);
        $organization->load('socialAccounts.socialAccountType');

        return view('pages.organizations.organizations_show', compact('organization'));
    }
}
