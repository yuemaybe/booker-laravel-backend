<?php

namespace App\Traits;

use App\Constants\ApiCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * 共用預設 response function.
     */
    public function defaultResponse(
        $data = null,
        string $message = '成功',
        string $apiCode = ApiCodes::HTTP_OK,
        int $httpCode = null,
    ): JsonResponse {
        return response()->json(compact('apiCode', 'message', 'data'), $httpCode ?? Response::HTTP_OK);
    }

    /**
     * Api success response.
     *
     * @param array|JsonResource|null $data
     */
    public function success($data = null): JsonResponse
    {
        return $this->defaultResponse($data);
    }

    /**
     * Api error response.
     */
    public function error(string $message = null, string $apiCode = ApiCodes::HTTP_ERROR): JsonResponse
    {
        return $this->defaultResponse(message: $message, apiCode: $apiCode);
    }

    /**
     * validation failed error response.
     */
    public function validationError(ValidationException $exception)
    {
        return $this->defaultResponse(message: $exception->getMessage());
    }
}
