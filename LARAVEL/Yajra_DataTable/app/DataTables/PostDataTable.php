<?php

namespace App\DataTables;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Stringable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class PostDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query->withTrashed()))
            ->setRowId('id')
            ->setRowClass('{{ $id % 2 == 0 ? "text-success" : "text-danger" }}')
            // ->setRowClass(function($post){
            //     return $post->id%2==0 ? "bg-warning" : "bg-info";
            // })
            // ->removeColumn("title")
            ->editColumn("content", function ($post) {
                return Str::limit($post->content, 50) . "...";
            })
            ->editColumn("created_at", function ($post) {
                return $post->created_at->diffForHumans();
            })
            ->editColumn("updated_at", function ($post) {
                return $post->updated_at->diffForHumans();
            })
            ->editColumn("action", function ($post) {
                return $post->deleted_at ? view("datatables.postRestoreBtn", ["id" => $post->id]) : view("datatables.postDeleteBtn", ["id" => $post->id]);
            });
    }

    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('post-table')
            ->addTableClass("border bg-white")
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
            Column::make('title'),
            Column::make('content'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action'),
        ];
    }


    protected function filename(): string
    {
        return 'Post_' . date('YmdHis');
    }
}
