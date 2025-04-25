<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

    public function rules()
    {
        $userId = $this->user?->id ?? null;

        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => 'nullable|string|max:20',
            'country' => 'required|string|in:UK,France,Germany,Spain',
            'gender' => 'required|string|in:male,female',
            'password' => $this->isMethod('post')
                ? 'required|string|confirmed|min:6'
                : 'nullable|string|confirmed|min:6',
            'profile_image' => 'nullable|image|max:2048',
        ];
    }
}
