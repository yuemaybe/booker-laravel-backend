<?php

namespace App\Exceptions;

use App\Constants\ApiCodes;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseException extends Exception
{
    use ApiResponse;

    public const API_CODE = ApiCodes::HTTP_ERROR;

    public const HTTP_CODE = Response::HTTP_OK;

    /**
     * message.
     *
     * @var string
     */
    protected $message;

    public function __construct(string $message = '')
    {
        parent::__construct($message);
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(): JsonResponse
    {
        return $this->error($this->message, static::API_CODE);
    }
}
