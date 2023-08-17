<?php

namespace App\Http\Controllers\API\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Admin\CategoryResource;
use Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API\Admin
 */
class CategoryAPIController extends AppBaseController
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

        $query = Category::query()->Active()->with(['sliders'=>function($q){return $q->Active();}]);

        if ($request->get('skip') && $request->get('limit')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }


        $categories = $query->get();


        return $this->sendResponse(CategoryResource::collection($categories), __('lang.api.retrieved'));
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
        /** @var Category $category */
        $category = Category::with('sliders')->find($id);

        if (empty($category)) {
            return $this->sendError(
                __('lang.api.not_found', ['model' => __('categories.singular')])
            );
        }

        return $this->sendResponse(
            new CategoryResource($category),
            __('lang.api.retrieved', ['model' => __('categories.singular')])
        );
    }


}
