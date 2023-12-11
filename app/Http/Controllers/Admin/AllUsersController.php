<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{


    public function PremiumUser()
    {
        $PremiumUser = User::where('type','premium')->where('role','user')->latest()->get();
        return view('backend.user.all_premium_user',compact('PremiumUser'));
    }

    public function PremiumUserDetails($id)
    {
        $PremiumUserDetails = User::findOrfail($id);
        return view('backend.user.premium_user_details',compact('PremiumUserDetails'));
    }

    public function NormalUserApprove(Request $request)
    {
        $user_id = $request->id ;
        $user = User::findOrfail($user_id)->update([
            'type' => 'normal',
        ]);
        $notification = array(
            'message' => 'User Be Normal Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all-user')->with($notification);

    }

    public function NormalUser()
    {
        $NormalUser = User::where('type','normal')->where('role','user')->latest()->get();
        return view('backend.user.all_normal_user',compact('NormalUser'));
    }

    public function NormalUserDetails($id)
    {
        $NormalUserDetails = User::findOrfail($id);
        return view('backend.user.normal_user_details',compact('NormalUserDetails'));
    }

    public function PremiumUserApprove(Request $request)
    {
        $user_id = $request->id ;
        $user = User::findOrfail($user_id)->update([
            'type' => 'premium',
        ]);
        $notification = array(
            'message' => 'User Be Premium Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('premium.user')->with($notification);

    }





    public function AllUser()
    {
        $users = User::where('role','user')->latest()->get();
        return view('backend.user.all_user_data',compact('users'));
    }

}
