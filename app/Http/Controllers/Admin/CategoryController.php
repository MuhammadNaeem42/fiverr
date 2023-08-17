<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoryDataTable;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;


use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_categories|create_categories|update_categories|delete_categories', ['only' => ['index', 'show']]);
        $this->middleware('permission:create_categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_categories', ['only' => ['delete']]);
    }


    /**
     * List Category
     * @param CategoryDataTable $categoryDataTable
     * @return mixed
     */
    public function index(CategoryDataTable $categoryDataTable)
    {

        return $categoryDataTable->render('admin.categories.index');

    }

    public function show($id)
    {
        return abort(404);
    }


    /**
     * Create Category
     *
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Store Category
     * @param CreateCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {

        $request_data = $request->except('_token');


        // Store Data
        $category = Category::create($request_data);
        session()->flash('success', __('lang.added_successfully'));

        return redirect()->route('admin.categories.index');


    }


    /**
     * Edit Category
     * @param $id
     * @return Factory|View|RedirectResponse|Redirector
     */
    public function edit($id)
    {
        /** @var Category $category */
        $category = Category::find($id);


        if (empty($category)) {
            session()->flash('error', __('lang.not_found'));
            return redirect(route('admin.categories.index'));
        }
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update Category
     * @param $id
     * @param UpdateCategoryRequest $request
     * @return RedirectResponse
     *
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        /** @var Category $category */
        $category = Category::find($id);

        if (empty($category)) {
            session()->flash('error', __('lang.not_found'));
            return redirect(route('admin.categories.index'));
        }

        $request_data = $request->except('_token');


        $category->fill($request_data);
        $category->save();

        session()->flash('success', __('lang.updated_successfully'));

        return redirect(route('admin.categories.index'));
    }

    /**
     * Delete Category
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            // Delete Category
            Category::whereId($category->id)->delete();

            DB::commit();
            session()->flash('success', __('lang.deleted_successfully'));
            return redirect()->route('admin.categories.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


}
