@extends('layout.main-layout')
@section('body')
 <div class="row">
 	<div class="col-md-12" align="center">
 		<div class="jumbotron">
	 		<div>
	 			<p class="home-text">Please login or  register</p>
	 			<button class="btn btn-success login_button" >Login</button>&nbsp;<button class="btn btn-primary register_button" >Register</button>
	 		</div>
	 		<div class="mt-5">
	            <form action="{{route('subscribe')}}" method="post">
	            	@csrf
				  <div class="form-group">
				    <input type="email" name="subscriber_email" placeholder="Enter your email"  class="form-control col-md-4 col-xs-12" id="exampleInputEmail1" aria-describedby="emailHelp">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					@if($errors->any('subscriber_email'))
						<span class="text-danger">{{$errors->first('subscriber_email')}}</span>
					@endif
				  </div>
				  <button type="submit" class="btn btn-primary">Subscribe</button>
				</form>
	 		</div>
 		</div>
 	</div>
 </div>

@include('partials.modals.login')
@include('partials.modals.register')
@endsection