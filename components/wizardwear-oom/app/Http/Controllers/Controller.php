<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function setSuccessFlashMessage(string $title = 'Success', string $message = ''): void
    {
        session()->flash('success', $title);
        session()->flash('success-extended-message', $message);
    }

    public function setDangerFlashMessage(string $title = 'Error', string $message = ''): void
    {
        session()->flash('danger', $title);
        session()->flash('danger-extended-message', $message);
    }
}
