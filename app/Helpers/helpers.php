<?php

use App\Exceptions\GeneralException;
use App\Helpers\uuid;
use App\Http\Utilities\SendEmail;
use App\Models\Notification\Notification;
use App\Models\Settings\Setting;
use Carbon\Carbon as Carbon;

/**
 * Henerate UUID.
 *
 * @return uuid
 */
function generateUuid()
{
    return uuid::uuid4();
}

if (!function_exists('homeRoute')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (access()->allow('view-backend')) {
            return 'admin.dashboard';
        } elseif (auth()->check()) {
            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}

/*
 * Global helpers file with misc functions.
 */
if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (!function_exists('history')) {
    /**
     * Access the history facade anywhere.
     */
    function history()
    {
        return app('history');
    }
}

if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory . $filename)) {
                array_push($directory_list, $directory . $filename . '/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory . '*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (!function_exists('getRtlCss')) {

    /**
     * The path being passed is generated by Laravel Mix manifest file
     * The webpack plugin takes the css filenames and appends rtl before the .css extension
     * So we take the original and place that in and send back the path.
     *
     * @param $path
     *
     * @return string
     */
    function getRtlCss($path)
    {
        $path = explode('/', $path);
        $filename = end($path);
        array_pop($path);
        $filename = rtrim($filename, '.css');

        return implode('/', $path) . '/' . $filename . '.rtl.css';
    }
}

if (!function_exists('settings')) {
    /**
     * Access the settings helper.
     */
    function settings()
    {
        // Settings Details
        $settings = Setting::latest()->first();
        if (!empty($settings)) {
            return $settings;
        }
    }
}

// Creating Notification
if (!function_exists('createNotification')) {
    /**
     * create new notification.
     *
     * @param  $message    message you want to show in notification
     * @param  $userId     To Whom You Want To send Notification
     * @param  $type       type of notification (1 - dashboard, 2 - email, 3 - both) (by default 1)
     * @param  $option     associate array [ 'data' => $data, 'email_template_type' => $template_type ]
     *
     * @return object
     */
    function createNotification($message, $receiverId, $type = 1, $object_id = 0, $options = [])
    {
        $notification = new Notification();
        return $notification->insert([
            'message' => $message,
            'receiver_id' => $receiverId,
            'sender_id' => \Auth::id(),
            'type' => $type,
            'object_id' => $object_id,
            'created_at' => Carbon::now(),
        ]);
        if ($type == 2 || $type == 3) {
            if (!empty($options['data']) && !empty($options['email_template_type'])) {
                $mail = new SendEmail();
                $emailResult = $mail->sendWithTemplate($options['data'], $options['email_template_type']);
            } else {
                throw new GeneralException('Invalid input given.option array shold contains data and email_template_type');
            }
        }
    }
}

if (!function_exists('escapeSlashes')) {
    /**
     * Access the escapeSlashes helper.
     */
    function escapeSlashes($path)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $path = str_replace('//', DIRECTORY_SEPARATOR, $path);
        $path = trim($path, DIRECTORY_SEPARATOR);

        return $path;
    }
}

if (!function_exists('getMenuItems')) {
    /**
     * Converts items (json string) to array and return array.
     */
    function getMenuItems($type = 'backend', $id = null)
    {
        $menu = new \App\Models\Menu\Menu();
        $menu = $menu->where('type', $type);
        if (!empty($id)) {
            $menu = $menu->where('id', $id);
        }
        $menu = $menu->first();
        if (!empty($menu) && !empty($menu->items)) {
            return json_decode($menu->items);
        }

        return [];
    }
}

if (!function_exists('getRouteUrl')) {
    /**
     * Converts querystring params to array and use it as route params and returns URL.
     */
    function getRouteUrl($url, $url_type = 'route', $separator = '?')
    {
        $routeUrl = '';
        if (!empty($url)) {
            if ($url_type == 'route') {
                if (strpos($url, $separator) !== false) {
                    $urlArray = explode($separator, $url);
                    $url = $urlArray[0];
                    parse_str($urlArray[1], $params);
                    $routeUrl = route($url, $params);
                } else {
                    $routeUrl = route($url);
                }
            } else {
                $routeUrl = $url;
            }
        }

        return $routeUrl;
    }
}

if (!function_exists('renderMenuItems')) {
    /**
     * render sidebar menu items after permission check.
     */
    function renderMenuItems($items, $viewName = 'backend.includes.partials.sidebar-item')
    {
        foreach ($items as $item) {
            // if(!empty($item->url) && !Route::has($item->url)) {
            //     return;
            // }
            if (!empty($item->view_permission_id)) {
                if (access()->allow($item->view_permission_id)) {
                    echo view($viewName, compact('item'));
                }
            } else {
                echo view($viewName, compact('item'));
            }
        }
    }
}

if (!function_exists('isActiveMenuItem')) {
    /**
     * checks if current URL is of current menu/sub-menu.
     */
    function isActiveMenuItem($item, $separator = '?')
    {
        $item->clean_url = $item->url;
        if (strpos($item->url, $separator) !== false) {
            $item->clean_url = explode($separator, $item->url, -1);
        }
        if (Active::checkRoutePattern($item->clean_url)) {
            return true;
        }
        if (!empty($item->children)) {
            foreach ($item->children as $child) {
                $child->clean_url = $child->url;
                if (strpos($child->url, $separator) !== false) {
                    $child->clean_url = explode($separator, $child->url, -1);
                }
                if (Active::checkRoutePattern($child->clean_url)) {
                    return true;
                }
            }
        }

        return false;
    }
}

function apiErrorRes($status_code, $message)
{
    return response()->json([
        'status_code' => $status_code,
        'message' => $message,
        'success' => false,
        'message_title' => 'Error'
    ], $status_code);
}

function apiSuccessRes($message)
{
    return response()->json([
        'message_title' => "Success",
        'message' => $message,
        'status_code' => 200,
        'success' => true,
    ]);
}

function array_find($needle, array $haystack, $column = null)
{
    if (is_array($haystack[0]) === true) { // check for multidimentional array

        foreach (array_column($haystack, $column) as $key => $value) {
            if (strpos(strtolower($value), strtolower($needle)) !== false) {
                return $key;
            }
        }
    } else {
        foreach ($haystack as $key => $value) { // for normal array
            if (strpos(strtolower($value), strtolower($needle)) !== false) {
                return $key;
            }
        }
    }
    return false;
}

function numToDecimal($number, $getOriginal = false)
{
    if (is_int($number)) {
        return $number . '.00';
    }
    return $number;
    //return bcadd($number, 0, 2);
}

/**
 * @array $token
 * @string $message
 * @string $notifyID
 * @return mixed
 */
function sendPushNotificationToFCMSever($fcmToken, $message,
                                        $linkTo = 'orderDetail',
                                        $notifyID = NULL,
                                        $object = array())
{
    if (!empty($fcmToken)) {
        $fcmToken = array_column($fcmToken->toArray(), 'fcm_token');
    }
    $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids' => $fcmToken,
        'priority' => 10,
        'notification' => [
            'title' => env('APP_NAME'),
            'body' => $message,
            'sound' => 'Default',
            'linkTo' => $linkTo,
            //'image' => 'Notification Image',
            'object' => $object
        ],
    );
    $headers = array(
        'Authorization:key=' . env('FCM_SERVER_KEY'),
        'Content-Type:application/json'
    );

    // Open connection
    $ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    // Execute post
    $result = curl_exec($ch);
    // Close connection
    curl_close($ch);
    return ['result' => $result, 'fcm_token' => $fcmToken];
}
