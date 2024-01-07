<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File ;



class UserController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'max:255',
            'phone' => 'required|unique:users,phone',
            'email' => 'max:255|email|unique:users,email',
            'country_id' => 'required|max:255',
            'country_code' => 'required|max:255'

        ]);
        $user = User::create($validated);
        return response()->json([
            'status' => 200,
            'data' => $user,
            'token' => $user->createToken('api_token')->plainTextToken
        ]);

    }

    public function login(Request $request)
    {
        $validated = $request->validate([

            'phone' => 'required'
        ]);


        $user = User::where('phone',$validated['phone'])->first();
        $user->tokens()->delete();
        if(!$user){
            return response()->json([
                'message' => 'Login Information Invalid'
            ],401);
        }else{
            return response()->json([
                'message' => "login successfully",
                "status" => 200 ,
                'data' => $user ,
                'token' => $user->createToken('api_token')->plainTextToken
            ]);

        }

    }

    public function profile(Request $request)
    {
        return response()->json([
            'status' => 200,
            'user' => $request->user()

        ]);

    }

    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name'      => 'sometimes|required|max:255',
            'last_name'       => 'nullable|max:255',
            'email'           => ['nullable','max:255','email', 'unique:users,email,' . Auth::user()->id],
            'job_description' => 'nullable',
            'company'         => 'nullable',
            'long'            => 'nullable' ,
            'lat'             => 'nullable',
            'access_token'    => 'nullable',
            'profile_image'   => 'image',
            'fcm_token'       => 'nullable',

        ]);
        if($validator->fails()){
            return response()->json([
                'message'=>'Validation Fails',
                'errors' => $validator->errors()
            ]);

        }
        $user = $request->user();
        if ($request->hasFile('profile_image')){
            if($user->profile_image){
                $old_path = public_path('upload/user_image/'.$user->profile_image);
                if (File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            $image_name ='profile_image-'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('/upload/user_image'),$image_name);

        }else{
            $image_name =$user->profile_image;
        }
        $user->update([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'profile_image'   => $image_name,
            'lat'             => $request->lat,
            'long'            => $request->long,
            'job_description' => $request->job_description,
            'company'         => $request->company,
            'email'           => $request->email,

        ]);
        return response()->json([
            'message' => 'updated successfully',
            'status' => 200,
            'data' => $user,
        ]);


    }








    public function logout(Request $request)
    {
        try{
            $request->user()->tokens()->delete();
            return response()->json([
                "status" => 200 ,
                "message" => "Logout Successfully"
            ]);
        } catch (\Exception $e){
            return response()->json([
//                "status" => 200 ,
                'message' => $e->getMessage()
            ]);
        }


    }
}
