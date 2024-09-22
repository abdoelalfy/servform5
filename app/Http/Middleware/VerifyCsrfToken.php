<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        // Add URIs here if you want to exclude them from CSRF verification.
    ];

    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * Get the time that the CSRF token should expire.
     *
     * @return \DateInterval|null
     */
    protected function tokensExpireIn()
    {
        // Return a DateInterval representing the desired token expiry time.
        return now()->addHour(); // This extends the token expiry to 1 hour.
    }
}