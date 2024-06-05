<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'signature' => ['nullable', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'firstname' => ['nullable', 'string', 'max:50'],
            'surname' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'gender' => ['nullable', 'string', 'max:20'],
            'privacy_settings' => ['nullable', 'in:1'],
            'privacy_email' => ['nullable', 'in:1,0'],
            'privacy_name' => ['nullable', 'in:1,0'],
            'privacy_address' => ['nullable', 'in:1,0'],
            'privacy_phone' => ['nullable', 'in:1,0'],
            'privacy_gender' => ['nullable', 'in:1,0'],
        ];
    }
}
