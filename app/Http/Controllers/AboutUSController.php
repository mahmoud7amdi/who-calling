<?php

namespace App\Http\Controllers;

use App\Models\AboutUS;
use Illuminate\Http\Request;

class AboutUSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutus = AboutUS::all();
        if (!$aboutus)
        {
            return response()->json([
                'status' => 400,
                'message' => trans('message.failed-message')
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => trans('message.all-about-us') ,
                'data' => $aboutus
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
            "text_ar" => 'required',
            "text_en" => 'required'

        ]);
        $aboutus = AboutUS::create($validated);
        return response()->json([
            'status' => 200,
            'message' => trans('message.added-success') ,
            'data' => $aboutus
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,$id)
    {
        $aboutUs = AboutUS::find($id);
        if($aboutUs)
        {
            return response()->json([
                'status' => 200,
                'data' => $aboutUs,


            ]);



        }else{
            return response()->json([
                'status' => 400,
                'message' => trans('message.About-us-not-found'),
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
    public function update(Request $request, $id )
    {
        $aboutUS = AboutUS::find($id);
        $validated = $request->validate([
            "text_ar" => 'required',
            "text_en" => 'required'
        ]);


            if ($aboutUS){
                $aboutUS->update($validated);
                return response()->json([
                    'status' => 200,
                    'message' => trans('message.About-us-updated'),
                    'data' => $aboutUS
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => trans('message.About-us-not-found'),

                ]);
            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aboutUS = AboutUS::find($id);

        if ($aboutUS){
            $aboutUS->delete();
            return response()->json([
                'message' => trans('message.About-us-deleted'),
                'status' => 200,

            ]);

        }else{
            return response()->json([
                'message' => trans('message.About-us-not-found'),


            ]);
        }
    }
}
