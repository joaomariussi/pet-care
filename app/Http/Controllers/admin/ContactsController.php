<?php

namespace App\Http\Controllers\admin;

use App\DataTables\ContactsDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\admin\Sectors;
use App\Models\site\Contacts;
use App\Models\site\Notifications;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactsController extends Controller
{

    public function __construct()
    {
        config(['view.active_sidebar' => 'contacts/']);
    }

    /**
     * @throws Exception
     */
    public function index(ContactsDataTable $dataTable): mixed
    {
        try {
            $totalContacts = Contacts::query()->count();
            return $dataTable->render('admin.pages.contacts.view-index', compact('totalContacts'));
        } catch (Throwable $t)  {
            throw new Exception($t->getMessage());
        }
    }

    /**
     * @param $id
     * @return View|Factory|RedirectResponse|Application
     * View para visualizar os detalhes do contato
     */
    public function viewDetailsContact($id): View|Factory|RedirectResponse|Application
    {
        try {
            $contact = Contacts::with('sectors')->where('id', $id)->first();
            return view('admin.pages.contacts.view-details-contacts', compact('contact'));
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao visualizar o contato!');
        }
        return redirect()->back();
    }

    /**
     * @throws Exception
     * @return RedirectResponse
     * Deleta o contato
     */
    public function deleteContact($id): RedirectResponse
    {
        try {
            Contacts::query()->findOrFail($id)->delete();
            UserNotification::success('Contato deletado com sucesso!');
            return redirect()->back();
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao deletar o contato!');
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return bool
     * Marca a notificação como lida
     */
    public function notificationRead($id): bool
    {
        try {
            $notify = Notifications::find($id);
            $notify->update(['read' => true]);
            return true;
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            UserNotification::error('Erro ao tentar ler a notificação!');
        }
        return false;
    }
}
