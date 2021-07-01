@extends('layout.main-layout')
@section('body')
 <div class="row mb-3">
     <form action="{{route('postLogin')}}" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="login_form">
     	  @csrf
          <div class="form-title">
             SIGN IN
          </div>

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email"  placeholder="Enter email">
		
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


		   <div class="form-check">
		    <input type="checkbox" {{(old('remember_me'))?'checked':''}} value="true" name="remember_me" id="remember_me" class="form-check-input" >
		    <label class="form-check-label" for="remember_me">Remember Me</label>

		  </div>

		   <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_CAPTCHA_KEY')}}"  data-callback="recaptchaDataCallbackLogin"  data-expired-callback="recaptchaExpireCallbackLogin"></div>

		   <input type="hidden"  name="grecaptcha" id="hiddenRecaptchaLogin" >
           <div id="hiddenRecaptchaLoginError"></div>
		    @if($errors->any('grecaptcha'))
				<span class="text-danger">{{$errors->first('grecaptcha')}}</span>
			@endif
		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Don't have an account <a href="{{route('getRegister')}}">sign up</a> here</div>

		   <div> <a href="{{route('getForgetPassword')}}">Forget Password</a></div>

	</form>	
</div>
@endsection