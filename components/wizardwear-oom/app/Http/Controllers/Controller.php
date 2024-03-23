<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected const array FLASH_KEYS = [
        'success_title' => 'success',
        'success_message' => 'success-extended-message',
        'danger_title' => 'danger',
        'danger_message' => 'danger-extended-message',
    ];
}
