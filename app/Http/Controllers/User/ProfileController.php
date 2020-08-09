<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use File;
use Hash;

class ProfileController extends Controller
{
    public function profile()
    {
    	return view('/user/profile');
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

    	//return view('user.profile', array('user' => Auth::user()) );
        return back();

    }

    public function updatePassword(Request $request)
    {   
        
        if (Hash::check($request->currentpassword, Auth::user()->password)) {

            $this->validate(request(), [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

            $user = Auth::user();
            $user->password = Hash::make($request['password']);
            $user->save();

            flash('Password Updated Successfully')->success();

            return back();
        }
        
        flash('Current password is incorrect!')->error();
        return back();

    }

}
