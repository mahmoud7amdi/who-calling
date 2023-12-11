<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }



    public function AdminDashboard()
    {
        return view('admin.index');
    }




    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id ;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }


    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_image')){
            $file = $request->file('profile_image') ;
            @unlink(public_path('upload/profile_image'.$data->profile_image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/profile_image'),$filename);
            $data['profile_image'] = $filename ;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
