<?php

namespace App\Exceptions;

use App\Constants\ApiCodes;

class NotFoundException extends BaseException
{
    public const API_CODE = ApiCodes::NOT_FOUND_CODE;

    public function __construct()
    {
        parent::__construct(ApiCodes::NOT_FOUND_MESSAGE);
    }
}
