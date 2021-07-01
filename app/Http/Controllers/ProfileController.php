<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
class ProfileController extends Controller
{
    public function dashboard(){
    	return view('profile.dashboard');
    }


    public function edit_profile(){
    	$user=auth()->user();
    	$data['user']=$user;
    	return view('profile.edit_profile',$data);
    }

    public function update_profile(Request $request){
    	 $request->validate([
         'first_name'=>'required|min:2|max:100',
         'last_name'=>'required|min:2|max:100',
         ],[
            'first_name.required'=>'First name is required',
            'last_name.required'=>'Last name is required',
         ]);

         $user=auth()->user();

         $user->update([
         	'first_name'=>$request->first_name,
         	'last_name'=>$request->last_name,
         ]);

         return redirect()->route('edit_profile')->with('success','Profile successfully updated');

    }

    public function change_password(){ 
        return view('profile.change_password');
    }


    public function update_password(Request $request){
        $request->validate([
        'old_password'=>'required|min:6|max:100',
        'new_password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success','Password successfully updated.');

        }else{
            return redirect()->back()->with('error','Old password does not matched.');
        }



    }

}
