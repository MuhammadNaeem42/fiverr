<?php

namespace App\DataTables\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class NotificationDataTable extends DataTable
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

        $dataTable->addColumn('title', function (DatabaseNotification $notification) {
            return $notification->data['title'];
        });
        $dataTable->addColumn('body', function (DatabaseNotification $notification) {
            return $notification->data['body'];
        });
        $dataTable->editColumn('created_at', function (DatabaseNotification $notification) {
            return Carbon::createFromDate($notification->created_at)->format('Y-m-d H:i');
        });
        return $dataTable->addColumn('action', function (DatabaseNotification $notification) {
            return view('admin.notifications.datatables_actions', compact('notification'));
        })->rawColumns(["action", "status"]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param DatabaseNotification $model
     * @return Builder
     */
    public function query(DatabaseNotification $model)
    {
        return auth('admin')->user()->notifications();
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
            ->addAction(['width' => 'auto', 'printable' => false, 'searchable' => false, 'exporting' => false, 'title' => __('lang.action')])

            ->parameters([
                'stateSave' => false,
                'responsive' => true,
                "autoWidth" => true,
                'orderable' => true,
                'pagingType' => 'simple_numbers',
//                'initComplete' => 'function() { $(\'ul.pagination\').addClass(\'flex-wrap\'); }',
                'order' => [[0, 'desc']],
                'buttons' =>[],
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
            'title' => new Column(['title' => __('notifications.title'), 'data' => 'title']),
            'body' => new Column(['body' => __('notifications.body'), 'data' => 'body']),
            'created_at' => new Column(['title' => __('notifications.created_at'), 'data' => 'created_at']),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'notifications_datatable_' . time();
    }
}
