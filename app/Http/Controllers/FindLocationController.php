<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindLocationController extends Controller
{
    public function nearUsers(User $user,$distance )
    {
        $user = Auth::user();
        $latitude = $user->lat;
        $longitude = $user->long;

        $haversine = "(
    6371 * acos(
        cos(radians(" .$latitude. "))
        * cos(radians(`lat`))
        * cos(radians(`long`) - radians(" .$longitude. "))
        + sin(radians(" .$latitude. ")) * sin(radians(`lat`))
    )
)";

        $users = User::select("id","first_name")
            ->selectRaw("$haversine AS distance")
            ->having("distance", "<=", $distance)
            ->orderby("distance", "desc")
            ->limit(10)
            ->get();
        return response()->json([
            'status' => 200,
            "message" => 'All near users',
            'data' => $users
        ]);

    }
}
