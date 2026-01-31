<?php

namespace App\Common\Providers;

use App\Common\Exceptions\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApiRouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->name('api.')
            ->missing(function (Request $request) {
                throw new NotFoundException();
            })
            ->group(base_path('routes/api.php'));
    }
}
