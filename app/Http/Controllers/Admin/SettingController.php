<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SettingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_settings|update_settings', ['only' => ['general']]);
        $this->middleware('permission:update_settings', ['only' => ['updateSettings']]);

    }

    public function general()
    {
        return view('admin.settings.index');

    }


    public function updateSettings(Request $request)
    {
        $type = $request->input('type_page_setting');

        if ($type == "general") {
            $request_general = $request->except('type_page_setting', '_token', 'logo');

            $request_general = collect($request_general)->filter(function ($item, $key) {
                return $item != null;
            })->toArray();

            if ($request->has('logo'))
                $request_general['logo'] = uploadImage('logos', $request->logo);

            setting($request_general)->save();
        }


        session()->flash('success', __('lang.updated_successfully'));

        return redirect()->back();


    }


}
