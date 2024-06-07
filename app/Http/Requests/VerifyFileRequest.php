<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required_without:link', 'mimes:txt,pdf,csv,xlx,xls,xlsx,doc,docx,html,htm,css,js,jpg,jpeg,png,gif,mp4,avi,3gp,webm,wav,ogg,mp3', 'max:3072'],
            'link' => ['required_without:file', 'string', 'max:255', 'not_in:.'],
        ];
    }
}
