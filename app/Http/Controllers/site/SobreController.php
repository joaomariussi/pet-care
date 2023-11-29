<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\site\ContactsCreateRequest;
use App\Http\Requests\site\ResumesCreateRequest;
use App\Models\admin\Jobs;
use App\Models\admin\Sectors;
use App\Models\site\Contacts;
use App\Models\site\Resumes;
use App\Notifications\UserNotification;
use App\Traits\FileTrait;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class SobreController extends Controller
{

    use FileTrait;

    /**
     * @return View|Factory|Application|RedirectResponse
     */
    public function quemSomos(): View|Factory|Application|RedirectResponse
    {
        return view('site.sobre.quem-somos');
    }

    /**
     * @return View|Factory|Application|RedirectResponse
     */
    public function trabalheConosco(): View|Factory|Application|RedirectResponse
    {
        try {
            $sectors = Sectors::query()->with('jobs')->get();
            return view('site.sobre.view-trabalhe-conosco', compact('sectors'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return View|Factory|Application|RedirectResponse
     */
    public function descricaoVaga($id): View|Factory|Application|RedirectResponse
    {
        try {
            $job = Jobs::query()->where('id', $id)->first();
            return view('site.sobre.view-descricao-vaga', compact('job'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param ResumesCreateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function enviarCurriculo(ResumesCreateRequest $request, $id): RedirectResponse
    {
        try {
            $file = $request->file('file_pdf');
            $saveFile = $this->saveLocal($file, 'curriculos', $file->getClientOriginalName());
            $attributes = $request->validated();
            $attributes['file_pdf'] = $saveFile['file_name'];
            $attributes['job_id'] = $id;
            Resumes::query()->create($attributes);
            UserNotification::success('Currículo enviado com sucesso!');
            return redirect()->back();
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao enviar currículo!');
        }
    }

    /**
     * @return View|Factory|Application|RedirectResponse
     * @throws Exception
     * @throws Throwable
     * @info Contato geral
     */
    public function contatoGeral(): View|Factory|Application|RedirectResponse
    {
        try {
            $sectors = Sectors::query()->get();
            return view('site.sobre.contato-geral', compact('sectors'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao enviar mensagem!');
        }
    }

    public function enviarContato(ContactsCreateRequest $request): RedirectResponse
    {
        try {
            $attributes = $request->validated();
            Contacts::query()->create($attributes);
            UserNotification::success('Mensagem enviada com sucesso!');
            return redirect()->back();
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao enviar mensagem!');
        }
    }
}
