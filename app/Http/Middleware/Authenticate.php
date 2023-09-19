<?php

namespace App\Http\Middleware;

use Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class Authenticate extends Middleware
{
    const LOGIN = 'login';
    const HOME =  'home';

    private string $redirectTo = self::LOGIN;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * @throws Exception
     */
    public function login($credentials, bool|null $remember = false): string
    {
        try {
            if (Auth::attempt($credentials, $remember)) {
                $this->redirectTo = self::HOME;
                return $this->redirectTo;
            }
            return $this->redirectTo;
        } catch ( Throwable $t ) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function logout(): string
    {
        try {
            Auth::logout();
            return $this->redirectTo;
        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }
}
