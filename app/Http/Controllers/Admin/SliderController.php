<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSliderRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_sliders|create_sliders|update_sliders|delete_sliders', ['only' => ['index']]);
        $this->middleware('permission:create_sliders', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_sliders', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_sliders', ['only' => ['delete']]);
    }


    /**
     * List Slider
     * @param SliderDataTable $sliderDataTable
     * @return mixed
     *
     */
    public function index(SliderDataTable $sliderDataTable)
    {

        return $sliderDataTable->render('admin.sliders.index');

    }

    /**
     * Create Slider
     *
     */
    public function create()
    {

        return view('admin.sliders.create');
    }

    /**
     * Store Slider
     * @param CreateSliderRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSliderRequest $request)
    {

        $request_data = $request->except('images');

        if ($request->has('images'))
            $request_data['images'] =saveArrayImage('sliders', $request->images);


        // Store Data
        $slider = Slider::create($request_data);
        session()->flash('success', __('lang.added_successfully'));
        return redirect()->route('admin.sliders.index');


    }

    /**
     * Update Status Of Slider
     * @param $slider_id
     * @param Integer $status
     * @return RedirectResponse
     */
    public function updateStatus($slider_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'slider_id' => $slider_id,
            'status' => $status
        ], [
            'slider_id' => 'required|exists:sliders,id',
            'status' => 'required|in:0,1',
        ]);

        // If Validations Fails
        if ($validate->fails()) {
            return redirect()->route('admin.sliders.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            Slider::whereId($slider_id)->update(['is_active' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.sliders.index')->with('success', trans('lang.updated_successfully'));
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit Slider
     * @param $id
     * @return Factory|View|RedirectResponse|Redirector
     */
    public function edit($id)
    {
        /** @var Slider $slider */
        $slider = Slider::find($id);


        if (empty($slider)) {
            session()->flash('error', __('lang.not_found'));
            return redirect(route('admin.sliders.index'));
        }
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update Slider
     * @param $id
     * @param UpdateSliderRequest $request
     * @return RedirectResponse
     *
     */
    public function update($id, UpdateSliderRequest $request)
    {
        /** @var Slider $slider */
        $slider = Slider::find($id);

        if (empty($slider)) {
            session()->flash('error', __('lang.not_found'));
            return redirect(route('admin.sliders.index'));
        }

        $request_data = $request->except('images');

        if ($request->has('images'))
            $request_data['images'] =saveArrayImage('sliders', $request->images);


        $slider->fill($request_data);
        $slider->save();

        session()->flash('success', __('lang.updated_successfully'));

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Delete Slider
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function destroy(Slider $slider)
    {
        DB::beginTransaction();
        try {
            // Delete Slider
            Slider::whereId($slider->id)->delete();

            DB::commit();
            session()->flash('success', __('lang.deleted_successfully'));
            return redirect()->route('admin.sliders.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


}
