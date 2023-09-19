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

    public function login(LoginRequestValidate $request): RedirectResponse
    {
        try {

            $credentials = $request->only('email', 'password');
            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                Session::put('user', Auth::user());
                return redirect()->route('home');
            }
            return redirect()->back();
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

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
