<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Resources\Admin\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API\Admin
 */
class SliderAPIController extends AppBaseController
{


    /**
     * Display a listing of the Category.
     * GET|HEAD /categories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $query = Slider::query()->Active()->with('category');

        if ($request->get('skip') && $request->get('limit')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }


        $sliders = $query->get();


        return $this->sendResponse(SliderResource::collection($sliders), __('lang.api.retrieved'));
    }


    /**
     * Display the specified Category.
     * GET|HEAD /categories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Slider $slider */
        $slider = Slider::with('category')->find($id);

        if (empty($slider)) {
            return $this->sendError(
                __('lang.api.not_found', ['model' => __('sliders.singular')])
            );
        }

        return $this->sendResponse(
            new SliderResource($slider),
            __('lang.api.retrieved', ['model' => __('sliders.singular')])
        );
    }


}
