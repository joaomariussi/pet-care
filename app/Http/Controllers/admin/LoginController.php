<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\admin\Auth\LoginRequestValidate;
use App\Notifications\UserNotification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Throwable;

/**
 * Class LoginController
 * @package App\Http\Controllers\admin
 */
class LoginController extends Controller
{

    private string $redirectTo = 'login';

    /**
     * @var Authenticate
     */
    private Authenticate $authenticate;

    /**
     * LoginController constructor.
     * @param Authenticate $authenticate
     */
    public function __construct(Authenticate $authenticate)
    {
        $this->authenticate = $authenticate;
    }

    /**
     * Login view
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.pages.auth.login');
    }

    /**
     * Login post
     *
     * @param LoginRequestValidate $request
     * @return RedirectResponse
     */
    public function login(LoginRequestValidate $request): RedirectResponse
    {
        try {

            if (Auth::attempt($request->only('email', 'password'))) {
                UserNotification::success('Login realizado com sucesso.');
                return redirect()->route('dashboard');
            } else {
                UserNotification::error('Login ou senha inválidos.');
                return redirect()->route('login');
            }
        } catch (Throwable $t) {
            applicationError($t, 'Falha ao realizar o login.');
        }
        return redirect()->route($this->redirectTo);
    }

    /**
     * Logout
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        try {
            $this->redirectTo = $this->authenticate->logout();
        } catch (Throwable $t) {
            applicationError($t, 'Falha ao realizar o logout.');
        }
        return redirect()->route($this->redirectTo);
    }
}
