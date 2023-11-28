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
                'message' => 'Not found'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'All About Us' ,
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
            "text" => 'required'
        ]);
        $aboutus = AboutUS::create($validated);
        return response()->json([
            'status' => 200,
            'message' => 'About us added successfully' ,
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
                'message' => 'About Us not found',
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
    public function update( Request $request, $id )
    {
        $aboutUS = AboutUS::find($id);
        $validated = $request->validate([
            "text" => 'required'
        ]);


            if ($aboutUS){
                $aboutUS->update($validated);
                return response()->json([
                    'status' => 200,
                    'message' => 'About US Updated Successfully',
                    'data' => $aboutUS
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => 'About US Not Found',

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
                'message' => 'About US deleted successfully',
                'status' => 200,

            ]);

        }else{
            return response()->json([
                'message' => 'About US Not found',


            ]);
        }
    }
}
