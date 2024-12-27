<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'telephone' => [
                'required',
                'string',
                'max:20',
                'regex:/^(\+2126\d{8}|\+2127\d{8}|06\d{8}|07\d{8})$/',
            ],
            'ville' => ['required', 'string', 'max:255'],
            'quartier' => ['max:255'],
        ];
    }
}