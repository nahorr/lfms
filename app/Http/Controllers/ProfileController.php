<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Auth;
use File;

class ProfileController extends Controller
{
    public function profile()
    {
    	return view('profile');
    }

    public function updateAvatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = preg_replace('/\s+/', '', Auth::user()->name) . time() . '.' . $avatar->getClientOriginalExtension();

    		// Delete current image before uploading new image
            if (Auth::user()->avatar !== 'default.jpg') {
                 $file = public_path('/uploads/avatars/' . Auth::user()->avatar);
                if (File::exists($file)) {
                    unlink($file);
                }
            }

    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }

}
