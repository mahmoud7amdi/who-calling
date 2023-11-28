<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $contacts = DB::table('contacts')->select('name','phone');

        $user = DB::table('users')->select('id', DB::raw('CONCAT(first_Name, " ", last_Name) AS name'), 'phone', 'email',
            'company', 'job_description', 'profile_image', 'lat', 'long', 'type', 'last_seen',
            'country_id', 'country_code'
        );

        if ($contacts)
        {
            if ($request->phone && $request->country_id){
             $result = $contacts->where('phone', $request->phone)
                 ->where('country_id', $request->country_id)->get();
            }
            return response()->json([
            'status' => 200,
            "message" => 'All search',
            "data" => $result
        ]);
        }elseif ($user)
        {
            if ($request->phone && $request->country_id){
                $result = $user->where('phone', $request->phone)
                    ->where('country_id', $request->country_id)->get();
            }
            return response()->json([
                'status' => 200,
                "message" => 'All search',
                "data" => $result
                ]);
        }




    }}


//        if ($request->name && $request->country_id){
//             $result = $contacts->where('name', $request->name)
//                 ->where('country_id', $request->country_id)->get();
//
//         }elseif($request->phone && $request->country_id) {
//             $result = $user->where('phone', $request->phone)
//                 ->where('country_id', $request->country_id)->get();
//
//
//         }elseif ($request->name && $request->country_id) {
//            $result = $user->where(DB::raw("concat(first_name, ' ', last_name) like '%name%' "), $request->name)
//                ->where('country_id', $request->country_id)->get();
//
//
//
//        }elseif ($request->phone && $request->country_id && $request->name) {
//            $result = $user->where('phone', $request->phone)
//                ->where('country_id', $request->country_id)
//                ->where(DB::raw("concat(first_name, ' ', last_name)"), $request->name)->get();
//
//        }elseif ($request->phone && $request->country_id) {
//            $result = $contacts->where('phone', $request->phone)
//                ->where('country_id', $request->country_id)->get();
//
//        }elseif ($request->name && $request->country_id) {
//            $result = $contacts->where('name', $request->name)
//                    ->where('country_id', $request->country_id)->get();
//
//        }else{
//            return 'not found';
//        }
//        return response()->json([
//            'status' => 200,
//            "message" => 'All search',
//            "data" => $result
//        ]);



//            if ($request->phone && $request->country_id) {
//                $result = $contacts->where('phone', $request->phone)
//                    ->where('country_id', $request->country_id)->get();
//                return response()->json([
//                    'status' => 200,
//                    "message" => 'All search',
//                    "data" => $result
//                ]);
//
//            } elseif ($request->name && $request->country_id) {
//                $result = $contacts->where('name', $request->name)
//                    ->where('country_id', $request->country_id)->get();
//                return response()->json([
//                    'status' => 200,
//                    "message" => 'All search',
//                    "data" => $result
//                ]);
//            }



//        if ($contacts) {
//
//            if ($request->phone && $request->country_id) {
//                $result = $contacts->where('phone', $request->phone)
//                    ->where('country_id', $request->country_id)->get();
//                return response()->json([
//                    'status' => 200,
//                    "message" => 'All search',
//                    "data" => $result
//                ]);
//
//            } elseif ($request->fisrt_name && $request->country_id) {
//                $result = $contacts->where('fisrt_name', $request->fisrt_name)
//                    ->where('country_id', $request->country_id)->get();
//                return response()->json([
//                    'status' => 200,
//                    "message" => 'All search',
//                    "data" => $result
//                ]);
//
//
//            } elseif ($request->phone && $request->country_id && $request->name) {
//                $result = $contacts->where('phone', $request->phone)
//                    ->where('country_id', $request->country_id)
//                    ->where(DB::raw("concat(first_name, ' ', last_name)"), $request->name)->get();
//                return response()->json([
//                    'status' => 200,
//                    "message" => 'All search',
//                    "data" => $result
//                ]);
//            }
//
//
//
//        }else{
//            return 'not found';
//        }


//
//    }
//}


//    public function Search(Request $request)
//    {
//        $user =  User::select('id', DB::raw('CONCAT(first_Name, " ", last_Name) AS name'), 'phone','email',
//            'company','job_description','profile_image','lat','long','type','last_seen',
//            'country_id','country_code'
//        );
//        $value = $request->name;
//        if ($request->phone && $request->country_id)
//        {
//            $result = $user->where('phone', $request->phone)
//                ->where('country_id',$request->country_id)->get();
//
//        }elseif ($request->name && $request->country_id){
//            $result = $user->where( DB::raw("concat(first_name, ' ', last_name) like '%name%' "), $request->name)
//                ->where('country_id',$request->country_id)->get();
//
//
//        }elseif ($request->phone && $request->country_id && $request->name)
//        {
//            $result = $user->where('phone', $request->phone)
//                ->where('country_id',$request->country_id)
//                ->where(DB::raw("concat(first_name, ' ', last_name)"),$request->name)->get();
//        }else{
//            return response()->json([
//                "message" => 'Not Found',
//
//            ]);
//        }
//
//        //        }elseif ($request->first_name && $request->country_id){
////            $result = $user->where('first_name', $request->first_name)
////                ->where('country_id',$request->country_id)->get();
//
//        return response()->json([
//            "message" => 'All search',
//            "data" => $result
//        ]);
//    }
//}
