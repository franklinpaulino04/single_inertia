<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch ($this->method())
        {
            case 'POST':
                return [
                    'name'       => ['required','string','max:255'],
                    'email'      => ['required','string','email','max:255', Rule::unique('users','email')],
                    'first_name' => ['required','string','max:255'],
                    'last_name'  => ['required','string','max:255'],
                    'phone'      => ['required','string','max:255'],
                    'avatar'     => ['required','string','max:255'],
                ];
            case 'PUT':
            case 'PATCH':
            return [
                'name'  => ['required','string','max:255'],
                'email' => ['required','string','email','max:255', Rule::unique('users','email')->ignore($this->user->id)],
            ];
            default:
                return [];
        }
    }

    public function attributes()
    {
        return [
            'name'       => 'Name',
            'email'      => 'Email',
            'first_name' => 'First Name',
            'last_name'  => 'Last Name',
            'phone'      => 'Phone',
            'avatar'     => 'Avatar',
        ];
    }
}
