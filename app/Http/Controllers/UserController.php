<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {

        return view('home');
    }

    public function uploadAvatar(Request $request) {
        //$userid = Auth::id();
        if ($request->hasFile('avatarImg')) {
            User::uploadAvatar($request->avatarImg);
            //$request->session()->flash('success', 'Image uploaded successfully');
            return redirect()->back()->with('success', 'Image uploaded successfully');
        } else {
            //$request->session()->flash('error', 'Image upload failed!');
            return redirect()->back()->with('error', 'Image upload failed!');
        }
    }

}
