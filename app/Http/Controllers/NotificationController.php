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



//        $fcm_token= User::find($id);
//        $validated = $request->validate([
//            "fcm_token" => 'required'
//        ]);
//
//
//        if ($fcm_token){
//            $fcm_token->update($validated);
//            return response()->json([
//                'status' => 200,
//                'message' => 'FcmToken Updated Successfully',
//                'data' => $fcm_token
//            ]);
//        }else{
//            return response()->json([
//                'status' => 400,
//                'message' => ' Not Found',
//
//            ]);
//        }


    }
}
