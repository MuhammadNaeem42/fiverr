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


class PartnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_partners|create_partners|update_partners|delete_partners', ['only' => ['index', 'show']]);
        $this->middleware('permission:update_partners', ['only' => ['edit', 'update']]);
    }



    /**
     */
    public function edit()
    {

        return view('admin.partners.edit');
    }

    /**
     * Update Category
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $type = $request->input('type_page_setting');
        $images=$request->type_partner=="box1"?'box1_partners_images':'box2_partners_images';

        if ($type == "partners") {


            $request_data = $request->except('type_page_setting', '_token', $images);

            $request_data = collect($request_data)->filter(function ($item, $key) {
                return $item != null;
            })->toArray();

            if ($request->has($images))
                $request_data[$images] =saveArrayImage('partners', $request->$images);

            setting($request_data)->save();
        }


        session()->flash('success', __('lang.updated_successfully'));

        return redirect()->back();
    }


}
