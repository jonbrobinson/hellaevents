<?php

namespace App\Models\Api\Requests;

class SocialAccountRequest
{
    /**
     * @var string
     */
    public $handle;

    /**
     * @var string
     */
    public $accountId;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var string
     */
    public $apiSecret;

    /**
     * @var string
     */
    public $accountType;
}
