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
                'message' => trans('message.privacy-policy-not-found')
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => trans('message.all-privacy-policy'),
                'data' => $privacyPolicy
            ]);
        }

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "text_ar" => 'required',
            "text_en" => 'required'
        ]);
        $privacyPolicy = privacyPolicy::create($validated);
        return response()->json([
            'status' => 200,
            'message' => trans('message.added-success'),
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
                'message' => trans('message.failed-message'),
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
            "text_ar" => 'required',
            "text_en" => 'required'
        ]);


        if ($privacyPolicy){
            $privacyPolicy->update($validated);
            return response()->json([
                'status' => 200,
                'message' => trans('message.privacy-policy-updated'),
                'data' => $privacyPolicy
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => trans('message.privacy-policy-not-found')

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
                'message' =>  trans('message.privacy-policy-deleted'),
                'status' => 200,

            ]);

        }else{
            return response()->json([
                'message' => trans('message.privacy-policy-not-found')


            ]);
        }

    }
}
