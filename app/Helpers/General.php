<?php
if (!function_exists('getPermissionsMap')) {
    function getPermissionsMap()
    {

        $permissions_map = [
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete',
//            'e' => 'export',
//            's' => 'status',
        ];

        return $permissions_map;

    }
}

if (!function_exists('getAllMolesWithPermissions')) {
    function getAllMolesWithPermissions()
    {

        $models = [
            'admins' => 'c,r,u,d,e',
            'categories' => 'c,r,u,d,e',
            'sliders' => 'c,r,u,d,e',
            'partners' => 'r,u',
            'contacts' => 'r',
            'subscribers' => 'r',
            'counters' => 'r,u',
            'settings' => 'r,u',


        ];

        return $models;
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($folder, $image)
    {

        $image->store('/', $folder);
        $fileName = $image->hashName();
        $path = 'images/' . $folder . '/' . $fileName;
        return $path;
    }
}

//get social setting
if (!function_exists('getSocialMedia')) {
    function getSocialMedia()
    {

        $socials = [
            'facebook_url' => ['title' => 'Facebook', 'icon' => 'fab fa-facebook-f', 'class' => 'facebook', 'url' => setting('facebook_url')],
            'twitter_url' => ['title' => 'Twitter', 'icon' => 'fab fa-twitter', 'class' => 'twitter', 'url' => setting('twitter_url')],
            'instagram_url' => ['title' => 'Instagram', 'icon' => 'fab fa-instagram', 'class' => 'instagram', 'url' => setting('instagram_url')],
            'youtube_url' => ['title' => 'Youtube', 'icon' => 'fab fa-youtube', 'class' => 'youtube', 'url' => setting('youtube_url')],
            'snapchat_url' => ['title' => 'Snapchat', 'icon' => 'fab fa-snapchat', 'class' => 'snapchat', 'url' => setting('snapchat_url')],
        ];

        $socials = collect($socials)->filter(function ($item, $key) {
            return $item['url'] != null;
        });

        return $socials;
    }
}
if (!function_exists('sendSMS')) {
    function sendSMS($number, $msg)
    {
        $MessageBird = new \MessageBird\Client(setting('message_bird_key', 'eRccmA3HBbjjaQHp13vnIRr2u'));
        $Message = new \MessageBird\Objects\Message();
        $Message->datacoding = $Message::DATACODING_UNICODE;
        $Message->originator = setting('message_bird_originator', 'Albar8a');
        $Message->recipients = [$number];
        $Message->body = $msg;

        $response = $MessageBird->messages->create($Message);

        return $response;
    }
}
if (!function_exists('sendVerifySMS')) {
    function sendVerifySMS($number)
    {
        $client = new \MessageBird\Client(setting('message_bird_key', 'eRccmA3HBbjjaQHp13vnIRr2u'));
        $verify = new \MessageBird\Objects\Verify();
        $verify->originator = setting('message_bird_originator', 'Albar8a');
        $verify->recipient = $number;
        $verify->timeout = 1800; // 30 min
        $verify->datacoding = 'unicode'; // 30 min
        $verify->template = " " . setting('application_name') . "  كود التحقق هو   %token.";


        $result = $client->verify->create($verify);

        return $result;
    }
}
if (!function_exists('verifyCode')) {
    function verifyCode($id, $token)
    {
        $client = new \MessageBird\Client(setting('message_bird_key', 'eRccmA3HBbjjaQHp13vnIRr2u'));

        try {
            $result = $client->verify->verify($id, $token);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        } catch (\MessageBird\Exceptions\HttpException $e) {
            return ['status' => false, 'message' => $e->getMessage()];

        } catch (\MessageBird\Exceptions\RequestException $e) {
            return ['status' => false, 'message' => $e->getMessage()];

        } catch (\MessageBird\Exceptions\ServerException $e) {
            return ['status' => false, 'message' => $e->getMessage()];

        }


        return ['status' => true, 'message' => 'Done'];
    }
}

if (!function_exists('getSubTotalAfterFees')) {
    function getSubTotalAfterFees($total)
    {
        $profit_ratio = setting('profit_ratio', 0);
        $amount = $total - ($total * ($profit_ratio / 100));

        return $amount;
    }
}
if (!function_exists('getTotalFees')) {
    function getTotalFees($total)
    {
        $profit_ratio = setting('profit_ratio', 0);
        $amount = ($total * ($profit_ratio / 100));

        return $amount;
    }

}

if (!function_exists('saveArrayImage')) {
    function saveArrayImage($folder, $images)
    {
        $ImageArray = [];
        foreach ($images as $image) {
            $image_path = uploadImage($folder, $image);
            array_push($ImageArray, $image_path);
        }
        return json_encode($ImageArray);
    }
}if (!function_exists('getCounters')) {
    function getCounters()
    {
        $all_data = [];
        foreach ([1,2,3,4] as $key=>$counter) {
            $data['key']=$counter;
            $data['name_ar']=setting('counters_'.$counter.'_name_ar');
            $data['name_en']=setting('counters_'.$counter.'_name_en');
            $data['number']=setting('counters_'.$counter.'_number');
            $all_data[]=$data;
        }
        return $all_data;
    }
}

