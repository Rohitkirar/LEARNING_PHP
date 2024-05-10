<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn("email", '{{view("datatables.anchortag" , ["email" => $email])}}' )
            ->rawColumns(['email'])
            ;
    }

 
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

  
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

  
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('number'),
            Column::make('username'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
