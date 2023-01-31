<?php

namespace Nrbsolution\Push_notification\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PushNotificationApiController extends Controller
{
    public function notification_send(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = [$request->device_key];
        $serverKey = env('SERVER_KEY');
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        if($serverKey ==null){
            return response()->json('server key missing , please add SERVER_KEY in env', 500);
        }
        $encodedData = json_encode($data);
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            // die('Curl failed: ' . curl_error($ch));
            // return redirect()->back()->with('error', 'Faild');
            return response()->json('Faild', 500);
        } else {
            // return redirect()->route('/')->with('success', 'Notification Send Successfully');
            return response()->json('Notification Send Successfully', 200);
        }

        // Close connection
        curl_close($ch);

        // FCM response
    }
}
