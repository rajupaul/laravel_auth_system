@extends('layout.main-layout')
@section('body')
 <div class="row mb-3">
     <form action="{{route('postResetPassword',$reset_code)}}" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="reset_password_form">
     	  @csrf
          <div class="form-title">
             RESET PASSWORD
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

		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button></div>
	</form>	
</div>
@endsection