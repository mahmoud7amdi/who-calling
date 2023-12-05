<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $contacts = Contacts::select('name', 'phone');

        $user = User::select('id', 'phone', DB::raw('CONCAT(first_Name, " ", last_Name) AS name'), 'email',
            'company', 'job_description', 'profile_image', 'lat', 'long', 'type', 'last_seen',
            'country_id', 'country_code'
        );

        if ($request->phone && $request->country_id) {


            $result = $contacts->where('phone', $request->phone)
                ->where('country_id', $request->country_id)->get();

            if ($result->isEmpty()) {
                $value = $user->where('phone', $request->phone)
                    ->where('country_id', $request->country_id)->get();
                return response()->json([
                    "message" => 'All search',
                    "data" => $value
                ]);

            }
            return response()->json([
                "message" => 'All search',
                "data" => $result
            ]);


        } elseif ($request->name && $request->country_id) {
            $result = $contacts->where('name', $request->name)
                ->where('country_id', $request->country_id)->get();
            if ($result->isEmpty()) {

                $value = $user->where(DB::raw("concat(first_name, ' ', last_name) "), $request->name)
                    ->where('country_id', $request->country_id)->get();
                return response()->json([
                    "message" => 'All search',
                    "data" => $value
                ]);
            }
            return response()->json([
                "message" => 'All search',
                "data" => $result
            ]);


        }elseif ($request->phone && $request->country_id && $request->name){
            $result = $user->where('phone', $request->phone)
                ->where('country_id',$request->country_id)
                ->where(DB::raw("concat(first_name, ' ', last_name) "),$request->name)->get();
            return response()->json([
                "message" => 'All search',
                "data" => $result
            ]);
        }else{
            return response()->json([
                "message" => 'Not Found'
            ]);
        }

    }
}
