<?php

namespace App\Http\Controllers;

use App\Models\ProfileView;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileViewController extends Controller
{
    public function ProfileView($id)
    {
      ProfileView::create(['visitor_id' => auth()->user()->id , 'profile_id'=>$id]);

    }
}
