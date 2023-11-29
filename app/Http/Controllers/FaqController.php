<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = Faq::select('id','question_'.app() -> getLocale() . ' as question','answer_'.app() -> getLocale() . ' as answer')->get();
        if (!$faq)
        {
            return response()->json([
                'status' => 400,
                'message' => 'Faq Not found'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'all faq' ,
                'data' => $faq
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_ar' => 'required',
            'question_en' => 'required',
            'answer_ar' => 'required',
            'answer_en' => 'required',
        ]);
        $faq = Faq::create($validated);
        return response()->json([
            'status' => 200,
            'message' => 'Faq Added Successfully',
            'data' => $faq
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $faq = Faq::find($id);
        if($faq)
        {
            return response()->json([
                'status' => 200,
                'data' => $faq,


            ]);



        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Faq not found',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $validated = $request->validate([
            'question_ar' => 'required',
            'question_en' => 'required',
            'answer_ar' => 'required',
            'answer_en' => 'required',
        ]);


        if ($faq){
            $faq->update($validated);
            return response()->json([
                'status' => 200,
                'message' => 'Faq Updated Successfully',
                'data' => $faq
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Faq Not Found',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);

        if ($faq){
            $faq->delete();
            return response()->json([
                'message' => 'Faq deleted successfully',
                'status' => 200,

            ]);

        }else{
            return response()->json([
                'message' => 'Faq Not found',


            ]);
        }
    }
}
