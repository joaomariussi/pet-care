<?php

namespace App\DataTables;

use App\Models\site\Contacts;
use Carbon\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class ContactsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query)
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return $this->getActionButtons($query);
            })
            ->editColumn('created_at', function ($query) {
                return $this->getCreatedAt($query->created_at);
            })
            ->escapeColumns([])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Contacts $model
     * @return QueryBuilder
     */
    public function query(Contacts $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contacts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
            ->language('//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json')
            ->responsive()
            ->autoWidth(false)
            ->buttons([
//                    $this->getButtons('jobs'),
//                $this->getExportButtons(),
//                $this->getPrintButton(),
//                $this->getAddButton('jobs.create'),
//                $this->getDeleteButton('jobs.destroy')
            ]);
    }

    /**
     * Get columns.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Ações'),
                Column::make('name')->title('Nome')->width(200),
                Column::make('email')->title('E-mail')->width(300),
                Column::make('phone_number')->title('Telefone')->width(300),
                Column::make('subject')->title('Assunto'),
                Column::make('created_at')->title('Data de Cadastro')->width(200),
            ];
    }

    /**
     * @param $query
     * @return string
     */
    private function getActionButtons($query): string
    {
        return (string)view('_includes.datatable.contacts-options', ['id' => $query->id]);
    }

    /**
     * @param $created_at
     * @return string
     */
    private function getCreatedAt($created_at): string
    {
        return Carbon::parse($created_at)->format('d/m/Y H:i:s');
    }
}
