<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Anik\Form\FormRequest;



class CreateAuthenticationRequest extends FormRequest
{

    protected function authorize(): bool
    {
        return false;
    }

    protected function rules(): array
    {
        return [
            "email"=>"required|unique|email|users,email,",
            "username"=>"required|unique",
            "password"=>"required|min:8"
        ];
    }
}
