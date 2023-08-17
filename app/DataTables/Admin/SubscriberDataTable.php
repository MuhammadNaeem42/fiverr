<?php

namespace App\DataTables\Admin;

use App\Models\Subscriber;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SubscriberDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);


        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Subscriber $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscriber $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $default_lang = app()->getLocale();
        $lang_json = $default_lang == "ar" ? 'Arabic.json' : 'English.json';

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
//            ->addAction(['width' => 'auto', 'printable' => false, 'searchable' => false, 'exporting' => false, 'title' => __('lang.action')])
            ->parameters([
                'stateSave' => false,
                'responsive' => true,
                "autoWidth" => true,
                'orderable' => true,
                'pagingType' => 'simple_numbers',
//                'initComplete' => 'function() { $(\'ul.pagination\').addClass(\'flex-wrap\'); }',
                'order' => [[0, 'desc']],
                'buttons' => [
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-plus"></i> ' . __('lang.create')],

                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-file-excel-o"></i> ' . __('lang.excel'),
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-print"></i> ' . __('lang.print'),
                        'title' => 'subscribers',
                    ],
                    [
                        'extend' => 'copy',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-copy"></i> ' . __('lang.copy'),
                        'title' => 'subscribers',
                        'exportOptions' => [
                            'columns' => ':visible:not(:last-child)'
                        ],
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> ' . __('lang.reset'),
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-refresh"></i> ' . __('lang.reload'),
                    ],
                ],
                'drawCallback' => 'function() { lazyLoadInstance.update(); }',
                'language' => [
                    "sProcessing" => "جارٍ التحميل...",
                    "sLengthMenu" => "أظهر _MENU_ مدخلات",
                    "sZeroRecords" => "لم يعثر على أية سجلات",
                    "sInfo" => "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty" => "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered" => "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix" => "",
                    "sSearch" => "ابحث:",
                    "sUrl" => "",
                    "oPaginate" => [
                        "sFirst" => "الأول",
                        "sPrevious" => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        "sNext" => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
                        "sLast" => 'الاخير'
                    ]
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => '#', 'data' => 'id', 'visible' => true, 'printable' => false, 'searchable' => false, 'exporting' => false]),
            'email' => new Column(['title' => __('subscribers.email'), 'data' => 'email']),
            'created_at' => new Column(['title' => __('subscribers.created_at'), 'data' => 'created_at']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'subscribers_datatable_' . time();
    }
}
