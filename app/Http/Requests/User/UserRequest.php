<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            // 'apell' => 'required',
            // 'name' => 'required',
            'sexo' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user)
            ],

            'celular' => [
                'required', 'min:9',
                Rule::unique('users')->ignore($this->user)
            ],
        ];
    }
}
