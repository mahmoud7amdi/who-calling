<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUS;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function AllAboutus()
    {
        $aboutus = AboutUS::latest()->get();
        return view('backend.aboutus.all_aboutus',compact('aboutus'));
    }

    public function AddAboutus()
    {
        return view('backend.aboutus.add_aboutus');
    }


    public function StoreAboutus(Request $request)
    {
        AboutUS::insert([
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,
        ]);
        $notification = array(
            'message' => 'About US Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('about.us')->with($notification);
    }


    public function EditAboutus($id)
    {
        $aboutus = AboutUS::findOrFail($id);
        return view('backend.aboutus.edit_aboutus',compact('aboutus'));
    }
    public function UpdateAboutus(Request $request)
    {
        $aboutus = $request->id ;

        AboutUS::findOrFail($aboutus)->update([
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,
        ]);


        $notification = array(
            'message' => 'About US  Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('about.us')->with($notification);

    }


    public function DeleteAboutus($id)
    {

        AboutUS::findOrFail($id)->delete();
        $notification = array(
            'message' => 'About US Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('about.us')->with($notification);
    }

}
