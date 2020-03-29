<?php

namespace App\Models\Api\Requests;

class OrganizationRequest
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $website;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var AddressRequest[]
     */
    public $addresses = [];

    /**
     * @var SocialAccountRequest[]
     */
    public $socialAccounts = [];
}
