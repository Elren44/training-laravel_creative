<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\Post\ApiService;

class BaseController extends Controller
{
    public ApiService $service;

    public function __construct(ApiService $service)
    {
        $this->service = $service;
    }
}
