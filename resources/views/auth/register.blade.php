@extends('layout.main-layout')
@section('body')
 <div class="row mb-3">
     <form action="{{route('postRegister')}}" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="regitration_form">
     	  @csrf
          <div class="form-title">
             SIGN UP
          </div>
     	   <div class="row">
     	   	<div class="col-md-6">
	     	  <div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" id="first_name" placeholder="First Name">
				@if($errors->any('first_name'))
					<span class="text-danger">{{$errors->first('first_name')}}</span>
				@endif
			  </div>
     	   	</div>
     	   	<div class="col-md-6">
	     	  <div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" id="last_name" placeholder="Last Name">
			    @if($errors->any('last_name'))
					<span class="text-danger">{{$errors->first('last_name')}}</span>
				@endif
			  </div>
     	   	</div>
     	   </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			@if($errors->any('email'))
				<span class="text-danger">{{$errors->first('email')}}</span>
			@endif
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" autocomplete="false" id="password" placeholder="Password">
			@if($errors->any('password'))
				<span class="text-danger">{{$errors->first('password')}}</span>
			@endif
		  </div>

		  <div class="form-group">
		    <label for="confirm_password">Confirm Password</label>
		    <input type="password" class="form-control" name="confirm_password" autocomplete="false" id="confirm_password" placeholder="Confirm Password">
			@if($errors->any('confirm_password'))
				<span class="text-danger">{{$errors->first('confirm_password')}}</span>
			@endif
		  </div>
		   <div class="form-check">
		    <input type="checkbox" {{(old('terms'))?'checked':''}} name="terms" id="terms" class="form-check-input" >
		    <label class="form-check-label" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>

		  </div>
		  <div id="terms_error"></div>
			@if($errors->any('terms'))
				<span class="text-danger">{{$errors->first('terms')}}</span>
			@endif
		   <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_CAPTCHA_KEY')}}"  data-callback="recaptchaDataCallbackRegister"  data-expired-callback="recaptchaExpireCallbackRegister"></div>

		   <input type="hidden"  name="grecaptcha" id="hiddenRecaptchaRegister" >
           <div id="hiddenRecaptchaRegisterError"></div>
		    @if($errors->any('grecaptcha'))
				<span class="text-danger">{{$errors->first('grecaptcha')}}</span>
			@endif
		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Already have an account <a href="">sign in</a> here</div>
	</form>	
</div>
@endsection