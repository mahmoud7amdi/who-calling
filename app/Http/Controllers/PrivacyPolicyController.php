<?php

namespace App\Http\Controllers;

use App\Models\privacyPolicy;
use Illuminate\Http\Request;


class PrivacyPolicyController extends Controller
{

    public function index()
    {
        $privacyPolicy = privacyPolicy::all();
        if (!$privacyPolicy)
        {
            return response()->json([
                'status' => 400,
                'message' => ' privacy Policy Not found'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'All privacy Policy',
                'data' => $privacyPolicy
            ]);
        }

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "text" => 'required'
        ]);
        $privacyPolicy = privacyPolicy::create($validated);
        return response()->json([
            'status' => 200,
            'message' => 'privacy Policy add successfully',
            'data' => $privacyPolicy
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $privacyPolicy = privacyPolicy::find($id);
        if($privacyPolicy)
        {
            return response()->json([
                'status' => 200,
                'data' => $privacyPolicy,


            ]);



        }else{
            return response()->json([
                'status' => 400,
                'message' => 'not found',
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
    public function update($id , Request $request)
    {
        $privacyPolicy = privacyPolicy::find($id);
        $validated = $request->validate([
            "text" => 'required'
        ]);


        if ($privacyPolicy){
            $privacyPolicy->update($validated);
            return response()->json([
                'status' => 200,
                'message' => 'privacy Policy Updated Successfully',
                'data' => $privacyPolicy
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'privacy Policy Not Found',

            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id , Request $request)
    {
        $privacyPolicy = privacyPolicy::find($id);

        if ($privacyPolicy){
            $privacyPolicy->delete();
            return response()->json([
                'message' => 'privacy Policy deleted successfully',
                'status' => 200,

            ]);

        }else{
            return response()->json([
                'message' => 'privacy Policy Not found',


            ]);
        }

    }
}
