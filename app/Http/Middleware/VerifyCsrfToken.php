<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */   protected $except = [
        //a
    'api/auth/register',
     'api/auth/login',
    'api/user',
    'api/user/profile',
    'api/lokasi/search',
    'api/searchcity',
    'api/getlokasi',
    'address/regencies',
     'api/sampah',
     'api/histori',
      'api/tarikdana'
    ];
}
