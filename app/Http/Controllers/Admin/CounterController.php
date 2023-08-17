<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryDataTable;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;


class CounterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_counters|create_counters|update_counters|delete_counters', ['only' => ['index', 'show']]);
        $this->middleware('permission:update_counters', ['only' => ['edit', 'update']]);
    }



    /**
     */
    public function edit()
    {

        return view('admin.counters.edit');
    }

    /**
     * Update Category
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $type = $request->input('type_page_setting');

        if ($type == "counters") {


            $request_data = $request->except('type_page_setting', '_token');

            $request_data = collect($request_data)->filter(function ($item, $key) {
                return $item != null;
            })->toArray();

            setting($request_data)->save();
        }


        session()->flash('success', __('lang.updated_successfully'));

        return redirect()->back();
    }


}
