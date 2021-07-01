@extends('layout.main-layout')
@section('body')
 <div class="row">
 	<div class="col-md-4">
 		<ul class="list-group profile-nav">
		  <li class="list-group-item {{(request()->route()->getName()=='dashboard')?'active':''}}"><a href="{{route('dashboard')}}">Dashboard </a></li>
		  <li class="list-group-item {{(request()->route()->getName()=='edit_profile')?'active':''}}"><a href="{{route('edit_profile')}}">Edit Profile</a></li>
		  <li class="list-group-item {{(request()->route()->getName()=='change_password')?'active':''}}"><a href="{{route('change_password')}}">Change Password</a></li>
		</ul>
 	</div>
    <div class="col-md-8">
    	@yield('profile')
    </div>
 </div>
@endsection