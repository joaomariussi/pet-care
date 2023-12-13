<?php

namespace App\DataTables;

use App\Models\admin\CategoriesBlog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

class CategoriesBlogDataTable extends DataTable
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
            ->escapeColumns([])
            ->setRowId('id');
    }

    /**
     * @return array<string, string>
     */
    public function query(CategoriesBlog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('categories_blog-table')
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

    /**
     * Get Columns
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->title('Ações'),
            Column::make('name-category')->title('Nome da Categoria'),
            Column::make('created_at')->title('Criado em')
        ];
    }

    /**
     * Get filename for export.
     * @param $query
     * @return string
     */
    private function getActionButtons($query): string
    {
        return (string)view('_includes.datatable.categories-blog-options', ['id' => $query->id]);
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
