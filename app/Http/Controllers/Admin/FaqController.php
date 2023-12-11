<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function AllFaq()
    {
        $allfaq = Faq::latest()->get();
        return view('backend.faq.all_faq',compact('allfaq'));
    }

    public function AddFaq()
    {
        return view('backend.faq.add_faq');
    }


    public function StoreFaq(Request $request)
    {
        Faq::insert([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'answer_ar' => $request->answer_ar,
            'answer_en' => $request->answer_en,
        ]);
        $notification = array(
            'message' => 'Faq Added Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);
    }


    public function EditFaq($id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.faq.edit_faq',compact('faq'));
    }
    public function UpdateFaq(Request $request)
    {
        $faq = $request->id ;

        Faq::findOrFail($faq)->update([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'answer_ar' => $request->answer_ar,
            'answer_en' => $request->answer_en,
        ]);


        $notification = array(
            'message' => 'Faq Updated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);

    }


    public function DeleteFaq($id)
    {

        Faq::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Faq Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.faq')->with($notification);
    }


}
