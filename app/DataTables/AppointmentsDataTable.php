<?php

namespace App\DataTables;

use App\Models\Appointments;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AppointmentsDataTable extends DataTable
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
//            ->editColumn('employee_id', function ($query) {
//                return $query->employee ? $query->employee->name : 'Sem funcionário';
//            })
            ->editColumn('schedule_date', function ($query) {
                return $this->getScheduleDate($query->schedule_date);
            })
            ->editColumn('schedule_time', function ($query) {
                return $this->getScheduleTime($query->schedule_time);
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
        return $appointments->newQuery()
            ->with(['pet', 'service', 'employee']) // Carrega a relação do pet, serviço e funcionário
            ->where(function ($w) {
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
            Column::make('pet_id')->title('Nome do Pet'),
            Column::make('service_id')->title('Serviço Realizado'),
            Column::make('schedule_date')->title('Data do Agendamento'),
            Column::make('schedule_time')->title('Horário do Agendamento'),
//            Column::make('employee_id')->title('Funcionário'),
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
        return (string)view('_includes.datatable.appointments-options', ['id' => $query->id]);
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
     * Formata a data do agendamento
     * @param $schedule_date
     * @return string
     */
    private function getScheduleDate($schedule_date): string
    {
        return Carbon::parse($schedule_date)->format('d/m/Y');
    }

    /**
     * Formata o horário do agendamento
     * @param $schedule_time
     * @return string
     */
    private function getScheduleTime($schedule_time): string
    {
        return Carbon::parse($schedule_time)->format('H:i');
    }
}

