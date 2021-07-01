<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
class HomeController extends Controller
{
    public function home(){
    	return view('home');
    }

    public function subscribe(Request $request){
    	$request->validate([
    		'subscriber_email'=>'required|email'
    	]);

    	try {

    		if(Newsletter::isSubscribed($request->subscriber_email)){
    			return redirect()->back()->with('error','Email already subscribed');
    		}else{

    			Newsletter::subscribe($request->subscriber_email);

    			return redirect()->back()->with('success','Email subscribed');

    		}
    		
    	} catch (\Exception $e) {

    		return redirect()->back()->with('error',$e->getMessage());
    		
    	}
    }
}
