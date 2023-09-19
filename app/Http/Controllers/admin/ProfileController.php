<?php

namespace App\Http\Controllers\admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\User\UserUpdateRequest;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class ProfileController extends Controller
{
    /*
     * ProfileController constructor.
     */
    public function __construct()
    {
        config(['view.active_sidebar' => 'profile/']);
    }

    /**
     * @return \Illuminate\Foundation\Application|Application|Factory|View
     */
    public function index(UserUpdateRequest $request, $id)
    {


    }

    public function updateUserProfile(UserUpdateRequest $request, $id)
    {

        try {
            $user = auth()->user()->find($id);
            $user->update($request->validated());
            UserNotification::success('Usuário atualizado com sucesso.');
            return redirect()->route('admin.profile.index');
        } catch (Throwable $t) {
            return applicationError($t);
        }

    }
}
