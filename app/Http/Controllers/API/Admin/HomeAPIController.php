<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Requests\API\CreateContactAPIRequest;
use App\Http\Requests\API\CreateSubscriberAPIRequest;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API\Admin
 */
class HomeAPIController extends AppBaseController
{


    /**
     * Display a listing of the Category.
     * GET|HEAD /categories
     *
     * @param Request $request
     * @return Response
     */
    public function contact(CreateContactAPIRequest $request)
    {
        $request_data = $request->except('_token');


        /** @var Contact $contact */
        $contact = Contact::create($request_data);


        return $this->sendSuccess(__('lang.api.saved', ['model' => __('contacts.singular')]));
    }
    public function subscriber(CreateSubscriberAPIRequest $request)
    {
        $request_data = $request->except('_token');


        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::create($request_data);


        return $this->sendSuccess(__('lang.api.saved', ['model' => __('subscribers.singular')]));
    }

    public function settings()
    {
        $data = [];
        $data['general'] = [
            'application_name' => setting('application_name'),
            'phone' => setting('phone'),
            'currency' => setting('currency'),
            'logo' => setting('logo') ? asset(setting('logo')) : null,
        ];
        $data['contact'] = [
            'contact_address' => setting('contact_address'),
            'contact_email' => setting('contact_email'),
            'contact_phone' => setting('contact_phone'),
            'latitude' => setting('latitude'),
            'longitude' => setting('longitude'),

        ];
        $images_1 = [];
        $images_2 = [];
        if (setting('box1_partners_images' )  && !is_array(setting('box1_partners_images')))
            $images_1 = collect(json_decode(setting('box1_partners_images')))->map(function ($item) {
                return asset($item);
            });
        if (setting('box2_partners_images') && !is_array(setting('box2_partners_images')))
            $images_2= collect(json_decode(setting('box2_partners_images')))->map(function ($item) {
                return asset($item);
            });
        $data['partners'] = [
            'box1_partners_name_ar' => setting('box1_partners_name_ar'),
            'box1_partners_name_en' => setting('box1_partners_name_en'),
            'box1_partners_images' => $images_1,

            'box2_partners_name_ar' => setting('box2_partners_name_ar'),
            'box2_partners_name_en' => setting('box2_partners_name_en'),
            'box2_partners_images' => $images_2,
        ];
        $data['counters'] = getCounters();
        $data['code'] = [
            'custom_css_codes' => setting('custom_css_codes'),
            'custom_javascript_codes' => setting('custom_javascript_codes'),
        ];
        $data['social_media'] = getSocialMedia();

        return $this->sendResponse($data, __('lang.api.saved', ['model' => __('contacts.singular')]));

    }


}
