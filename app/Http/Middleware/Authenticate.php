<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param mixed $request
     */
    protected function redirectTo($request): ?string
    {
        return null;
        //return $request->expectsJson() ? null : route('login');
    }
}