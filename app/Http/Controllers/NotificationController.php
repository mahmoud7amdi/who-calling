<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{



    public function update( Request $request )
    {

//        $validator = Validator::make($request->all(),[
//            'fcm_token'      => 'required',
//
//        ]);
        $fcm_token = $request->user();
        $fcm_token->update([
            'fcm_token' => $request->fcm_token
        ]);
        return response()->json([
            'message' => 'updated successfully',
            'status' => 200,
            'data' => $fcm_token,
        ]);




    }


    public function send(Request $request)
    {
        return $this->sendNotification($request->fcm_token, array(
            "title" => "Sample Message",
            "body" => "This is Test message body"
        ));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification($fcm_token, $message)
    {
        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        $SERVER_API_KEY = 'AAAAzENtM4o:APA91bEffl7lD_Lh7MGNX_qOdZPvZGNkPGUgPKOXCqgXrdPyqDUVkovKvSMwy9BHBY3tvGLiFiIV2S1dtzTMEUP-Phwq0YKQTGoyekHm0Tlm1qn_93bK-EZHC9jUExdy7fcPuOMn8O5I';

        // payload data, it will vary according to requirement
        $data = [
            "registration_ids" => $firebaseToken,
            "data" => $message
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }



//public function savePushNotificationFcm(Request $request)
//    {
//        auth()->user()->update(['fcm_token'=>$request->fcm_token]);
//        return response()->json(['token saved successfully.']);
//    }
//
//    public function sendPushNotification(Request $request)
//    {
//        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
//
//        $SERVER_API_KEY = 'AAAAzENtM4o:APA91bEffl7lD_Lh7MGNX_qOdZPvZGNkPGUgPKOXCqgXrdPyqDUVkovKvSMwy9BHBY3tvGLiFiIV2S1dtzTMEUP-Phwq0YKQTGoyekHm0Tlm1qn_93bK-EZHC9jUExdy7fcPuOMn8O5I';
//
//        $data = [
//            "registration_ids" => $firebaseToken,
//            "notification" => [
//                "title" => $request->title,
//                "body" => $request->body,
//            ]
//        ];
//        $dataString = json_encode($data);
//
//        $headers = [
//            'Authorization: key=' . $SERVER_API_KEY,
//            'Content-Type: application/json',
//        ];
//
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//
//        $response = curl_exec($ch);
//
//        dd($response);
//    }

}
