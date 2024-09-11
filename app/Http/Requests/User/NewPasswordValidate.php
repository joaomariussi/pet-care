<?php

namespace App\Http\Requests\User;

use App\Exceptions\CustomLog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Throwable;

class NewPasswordValidate extends FormRequest
{
    public mixed $password;
    public mixed $current_password;

    /**
     * @return bool
     */
    public function authorize():bool
    {
        $this->validateCredentials();
        return Auth::check();
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string',
            'new_password' => [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm_new_password' => 'required|string|same:new_password',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'current_password.required' => 'A senha atual é obrigatória',
            'new_password.required' => 'A nova senha é obrigatória',
            'confirm_new_password.required' => 'A confirmação da nova senha é obrigatória',
            'confirm_new_password.same' => 'A confirmação da nova senha não confere',
            'new_password.regex' => 'A senha precisa conter Maiúsculas Minúsculas Números e Caracteres especiais',
        ];
    }

    /**
     * @return void
     */
    public function validateCredentials(): void
    {
        try {
            $valid = Auth::validate([
                'email' => Auth::user()['email'],
                'password' => $this['current_password']
            ]);
            if (!$valid) {
                $this['current_password'] = null;
            }
        } catch (Throwable $t) {
            $this['current_password'] = null;
            \Illuminate\Support\Facades\Log::error($t->getMessage());
        }
    }

}
