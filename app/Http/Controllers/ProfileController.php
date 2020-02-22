<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Profile;

class ProfileController extends Controller
{
    public function user_store(Request $request)
    {
        
        $validator = Validator::make ($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'about_me' => ['required', 'string', 'max:255'],
            ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $profile = new Profile;
        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->address = $request->address;
        $profile->about_me = $request->about_me;
        $profile->save();
        return back();
    }
}