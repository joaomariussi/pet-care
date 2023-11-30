<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Home\HomeConfigCreateRequest;
use App\Models\admin\HomeConfig;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class HomePageController extends Controller
{

    /**
     * @var HomeConfig
     */
    private HomeConfig $homeConfig;

    public function __construct(HomeConfig $homeConfig)
    {
        config(['view.active_sidebar' => 'home/']);
        $this->homeConfig = $homeConfig;
    }

    /**
     * @return Application|Factory|View|RedirectResponse|null
     */
    public function index(): View|Factory|Application|RedirectResponse|null
    {
        try {
            $homeConfig = $this->homeConfig::query()->first();
            return view('admin.pages.home.view-index', compact('homeConfig'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao carregar as configurações da home!');
        }
        return view('admin.pages.home.view-index');
    }

    /**
     * @param HomeConfigCreateRequest $request
     * @return RedirectResponse
     * @throws Throwable
     * Cria uma nova configuração da home
     */
    public function createConfigHome(HomeConfigCreateRequest $request): RedirectResponse
    {
        try {
            $homeConfig = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $homeConfig['avatar'] = $imageBase64;
            }
            $this->homeConfig::query()->create($homeConfig);
            UserNotification::success('Configuração da home criada com sucesso!');
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao criar a configuração da home!');
        }
        return redirect()->back();
    }

    public function updateConfigHome(HomeConfigCreateRequest $request): RedirectResponse
    {
        try {
            $homeConfig = $request->validated();
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
                $homeConfig['avatar'] = $imageBase64;
            }
            $this->homeConfig::query()->update($homeConfig);
            UserNotification::success('Configuração da home atualizada com sucesso!');
        } catch (Throwable $t) {
            dd($t->getMessage());
            Log::error($t->getMessage());
            UserNotification::error('Erro ao atualizar a configuração da home!');
        }
        return redirect()->back();
    }
}
