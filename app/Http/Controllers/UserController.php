<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\admin\User\NewPasswordValidate;
use App\Http\Requests\admin\User\UserAvatarUpdateRequest;
use App\Http\Requests\admin\User\UserCreateRequest;
use App\Http\Requests\admin\User\UserProfileUpdateRequest;
use App\Http\Requests\admin\User\UserUpdateRequest;
use App\Models\User;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    /*
     * @var User
     */
    private User $user;

    public function __construct(User $user)
    {
        config(['view.active_sidebar' => 'user/']);
        $this->user = $user;
    }

    /**
     * @throws Exception
     */
    public function index(UserDataTable $datatable): mixed
    {
        try {

            $totalUsers = User::count();

            return $datatable->render('admin.pages.user.view-index-user', compact('totalUsers'));

        } catch (Throwable $t) {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @return View|Factory|Application
     */
    public function ViewCreateUser()
    {
        return view('admin.pages.user.view-create-user');
    }

    /**
     * @param UserCreateRequest $request
     * @return RedirectResponse
     */
    public function create(UserCreateRequest $request): RedirectResponse
    {
        try {
            $attributes = $request->validated();

            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $attributes['avatar'] = $imageBase64;
            }
            $attributes['password_recovery_token'] = encrypt($attributes['password']);
            $this->user::query()->create($attributes);
            UserNotification::success('Usuário cadastrado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao cadastrar usuário.');
            return redirect()->back()->withInput();
        }

        return redirect()->route('user');
    }

    /**
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewUpdateUser($id): View|Factory|RedirectResponse|Application
    {
        try {
            $user = $this->user::query()->findOrFail($id);
            return view('admin.pages.user.view-update-user', compact('user'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar usuário.');
        }
        return redirect()->route('user');
    }

    /**
     * @param UserUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $attributes = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $attributes['avatar'] = $imageBase64;
            }
            $this->user::query()->findOrFail($id)->update($attributes);
            UserNotification::success('Usuário atualizado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar usuário.');
        }
        return redirect()->route('user');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            $this->user::query()->findOrFail($id)->delete();
            UserNotification::success('Usuário excluído com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao excluir usuário.');
        }
        return redirect()->route('user');
    }

    /**
     * @return View|Factory|RedirectResponse|Application
     */
    public function viewProfileUser(): View|Factory|RedirectResponse|Application
    {
        config(['view.active_sidebar' => 'user/view-profile-user']);
        try {
            $user = $this->user::query()->findOrFail(Auth::user()->id);
            return view('admin.pages.user.view-profile-user', compact('user'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar usuário.');
        }
        return redirect()->route('user');
    }

    /**
     * @param UserProfileUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateUserProfile(UserProfileUpdateRequest $request, $id): RedirectResponse
    {
        try {

            $attributes = $request->validated();
            $this->user::query()->findOrFail($id)->update($attributes);


            UserNotification::success('Usuário atualizado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar usuário.');
        }
        return redirect()->route('profile-user');
    }

    /**
     * @param UserAvatarUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateAvatar(UserAvatarUpdateRequest $request, $id): RedirectResponse
    {
        try {

            $attributes = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $attributes['avatar'] = $imageBase64;
            }
            $this->user::query()->findOrFail($id)->update($attributes);
            UserNotification::success('Avatar atualizado com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar avatar.');
        }
        return redirect()->route('profile-user');
    }


    /**
     * @param NewPasswordValidate $request
     * @return RedirectResponse
     */
    public function updatePassword(NewPasswordValidate $request): RedirectResponse
    {

        try {

            $user = Auth::user();
            $attributes = $request->validated();


            if (!Auth::validate(['email' => $user->email, 'password' => $request->input('current_password')])) {
                UserNotification::error('Senha atual incorreta.');
                return redirect()->route('profile-user');
            }

            $user->password = bcrypt($attributes['new_password']);
            $user->password_recovery_token = encrypt($attributes['new_password']);
            $user->save();

            UserNotification::success('Senha atualizada com sucesso.');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar senha.');
        }
        return redirect()->route('profile-user');
    }
}
