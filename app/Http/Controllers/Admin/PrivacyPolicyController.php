<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\privacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function AllPrivacy()
    {
        $allPrivacy = privacyPolicy::latest()->get();
        return view('backend.privacy.all_privacy',compact('allPrivacy'));
    }

    public function AddPrivacy()
    {
        return view('backend.privacy.add_privacy');
    }


    public function StorePrivacy(Request $request)
    {
        privacyPolicy::insert([
            'text' => $request->text,
        ]);
        $notification = array(
            'message' => 'privacy Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('privacy.policy')->with($notification);
    }


    public function EditPrivacy($id)
    {
        $Privacy = privacyPolicy::findOrFail($id);
        return view('backend.privacy.edit_privacy',compact('Privacy'));
    }
    public function UpdatePrivacy(Request $request)
    {
        $Privacy = $request->id ;

        privacyPolicy::findOrFail($Privacy)->update([
            'text'=> $request->text
        ]);


        $notification = array(
            'message' => 'privacy Policy Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('privacy.policy')->with($notification);

    }


    public function DeletePrivacy($id)
    {

        privacyPolicy::findOrFail($id)->delete();
        $notification = array(
            'message' => 'privacy Policy Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('privacy.policy')->with($notification);
    }
}
