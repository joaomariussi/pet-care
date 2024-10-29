<?php

namespace App\DataTables;

use App\Models\Appointments;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DashboardDataTable extends DataTable
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
            ->editColumn('pet_id', function ($query) {
                return $query->pet ? $query->pet->name : 'Sem pet';
            })
            ->editColumn('service_id', function ($query) {
                return $query->service ? $query->service->name : 'Sem serviço';
            })
            ->editColumn('employee_id', function ($query) {
                return $query->employee ? $query->employee->name : 'Sem funcionário';
            })
            ->editColumn('created_at', function ($query) {
                return $this->getCreatedAt($query->created_at);
            })
            ->escapeColumns([])
            ->setRowId('id');
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Appointments $appointments): QueryBuilder
    {
        try {
            return $appointments->newQuery()
                ->with(['pet', 'service', 'employee'])
                ->whereMonth('schedule_date', now()->month)
                ->whereYear('schedule_date', now()->year)
                ->where(function ($w) {
                });
        } catch (Exception $e) {
            Log::error("Erro na query da DataTable: " . $e->getMessage());
            return $appointments->newQuery(); // Retorno alternativo em caso de erro
        }
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
            Column::make('pet_id')->title('Nome do Pet'),
            Column::make('service_id')->title('Serviço Realizado'),
            Column::make('employee_id')->title('Funcionário'),
            Column::make('status')->title('Status'),
            Column::make('created_at')->title('Criado em')
        ];
    }

    /**
     * @param $query
     * @return string
     */
    private function getActionButtons($query): string
    {
        return (string)view('_includes.datatable.dashboard-options', ['id' => $query->id]);
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

