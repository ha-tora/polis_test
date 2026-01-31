<?php

namespace App\Common\Providers;

use Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ApiResponseProvider extends ServiceProvider
{
    public function boot(): void
    {
        Response::macro('success', function ($data = [], int $status = 200, string $message = 'OK'): JsonResponse {
            $format = [
                'status'    => true,
                'message'   => $message,
                'data'      => $data
            ];

            if (isset($data->resource) && $data->resource instanceof LengthAwarePaginator) {
                $resource = $data->resource->toArray();

                $format += [
                    'links'     => $resource['links'],
                    'meta'      => Arr::except($resource, ['links', 'data'])
                ];
            }

            return Response::json($format, $status);
        });

        Response::macro('error', function ($errors = [], int $status = 500, string $message = 'Internal Server Error'): JsonResponse {
            $format = [
                'status' => $status,
                'message' => $message,
                'errors' => $errors
            ];

            return Response::json($format, $status);
        });
    }
}
