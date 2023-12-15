<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\site\ContactsCreateRequest;
use App\Http\Requests\site\ResumesCreateRequest;
use App\Mail\NovoCadastroMail;
use App\Mail\NovoCurriculoRecebido;
use App\Models\admin\Jobs;
use App\Models\admin\Sectors;
use App\Models\site\Contacts;
use App\Models\site\Notifications;
use App\Models\site\Resumes;
use App\Notifications\UserNotification;
use App\Traits\FileTrait;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
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
            $sectors = Sectors::query()->with('jobs')
                ->where('status', '1')
                ->get();
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
            $keySecret = env('RECAPTCHA_SECRET_KEY');
            $userResponse = $request->get('g-recaptcha-response');
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $keySecret,
                'response' => $userResponse
            ]);
            $dados = $response->json();

            if ($dados['success']) {
                $file = $request->file('file_pdf');
                $saveFile = $this->saveLocal($file, 'curriculos', $file->getClientOriginalName());
                $attributes = $request->validated();
                $attributes['file_pdf'] = $saveFile['file_name'];
                $attributes['job_id'] = $id;
                $resumes = Resumes::query()->create($attributes);

                $job = $resumes->job;
                $sector = $job->sectors;

                Mail::to($sector->email_sector)->send(new NovoCurriculoRecebido($resumes, $job, $sector));

                Notifications::query()->create([
                    'message' => 'Novo currículo recebido!',
                    'link' => route('jobs.view-details-resumes', $resumes['id']),
                    'type' => 'jobs'
                ]);

                UserNotification::success('Currículo enviado com sucesso!');
            } else {
                UserNotification::error('Erro ao enviar currículo!');
            }
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
            $sectors = Sectors::query()
                ->where('status', 1)
                ->where('available', 1)
                ->get();
            return view('site.sobre.contato-geral', compact('sectors'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao enviar mensagem!');
        }
    }

    /**
     * @param ContactsCreateRequest $request
     * @return RedirectResponse
     * @throws Exception
     * @throws Throwable
     * @info Enviar contato geral
     */
    public function enviarContato(ContactsCreateRequest $request): RedirectResponse
    {
        try {
            $keySecret = env('RECAPTCHA_SECRET_KEY');
            $userResponse = $request->get('g-recaptcha-response');
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $keySecret,
                'response' => $userResponse
            ]);
            $dados = $response->json();
            if ($dados['success']) {
                $attributes = $request->validated();
                $contacts = Contacts::query()->create($attributes);

                // Obter o e-mail do setor
                $sectorId = $attributes['sector_id'];
                $sector = Sectors::query()->findOrFail($sectorId);
                $sectorEmail = $sector['email_sector'];

                Mail::to($sectorEmail)->send(new NovoCadastroMail($contacts, $sector));

                Notifications::query()->create([
                    'message' => 'Novo formulário de contato recebido!',
                    'link' => route('contacts.view-details', $contacts['id']),
                    'type' => 'contacts'
                ]);
                UserNotification::success('Mensagem enviada com sucesso!');
            } else {
                UserNotification::error('Erro ao enviar mensagem!');
            }

            return redirect()->back();
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao enviar mensagem!');
        }
    }

    /**
     * @param $filename
     * @return BinaryFileResponse
     */
    public function downloadPdf($filename): BinaryFileResponse
    {
        try {
            $filePath = public_path('imports/catalogs/' . $filename);
            return response()->download($filePath);
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return redirect()->back()->with('error', 'Erro ao baixar arquivo!');
        }

    }
}
