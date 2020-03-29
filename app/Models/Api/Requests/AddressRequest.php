<?php

namespace App\Models\Api\Requests;

class AddressRequest
{
    /**
     * @var int
     */
    public $primary = 0;

    /**
     * @var int
     */
    public $capacityMin;

    /**
     * @var int
     */
    public $capacityMax;

    /**
     * @var string
     */
    public $address1;

    /**
     * @var string
     */
    public $address2;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var int
     */
    public $zip5;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $facilityType;

    /**
     * @var string
     */
    public $tableType;
}
