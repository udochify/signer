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
            'firstname' => ['nullable', 'string', 'max:50'],
            'surname' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'gender' => ['nullable', 'string', 'max:20'],
            'privacy_email' => ['nullable', 'boolean'],
            'privacy_name' => ['nullable', 'boolean'],
            'privacy_address' => ['nullable', 'boolean'],
            'privacy_phone' => ['nullable', 'boolean'],
            'privacy_gender' => ['nullable', 'boolean'],
        ];
    }
}
