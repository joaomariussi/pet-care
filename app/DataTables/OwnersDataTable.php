<?php

namespace App\DataTables;

use App\Models\Owners;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OwnersDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return $this->getActionButtons($query);
            })
            ->editColumn('created_at', function ($query) {
                return $this->getCreatedAt($query->created_at);
            })
            ->editColumn('cpf', function ($query) {
                return $this->formatCpf($query->cpf);
            })
            ->escapeColumns([])
            ->setRowId('id');
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Owners $owners): QueryBuilder
    {
        return $owners->newQuery()
            ->where(function ($w) {
                if (Auth::user()->type === 'webmaster') {
                    return;
                }

                $w->where('type', '!=', 'webmaster');
            });
    }
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
            ->language('//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json')
            ->responsive()
            ->autoWidth(false)
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Ações'),
            Column::make('name')->title('Nome'),
            Column::make('cpf')->title('CPF'),
            Column::make('email')->title('E-mail'),
            Column::make('created_at')->title('Criado em')
        ];
    }

    /**
     * @param $query
     * @return string
     */
    private function getActionButtons($query): string
    {
        return (string)view('_includes.datatable.owners-options', ['id' => $query->id]);
    }

    /**
     * @param $created_at
     * @return string
     */
    private function getCreatedAt($created_at): string
    {
        return Carbon::parse($created_at)->format('d/m/Y H:i:s');
    }

    /**
     * Formata o CPF
     * @param $cpf
     * @return string
     */
    public function formatCpf($cpf): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
    }
}

