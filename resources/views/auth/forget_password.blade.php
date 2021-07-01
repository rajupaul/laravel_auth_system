@extends('layout.main-layout')
@section('body')
 <div class="row mb-3">
     <form action="{{route('postForgetPassword')}}" method="POST" class="col-md-6 col-xs-12 offset-md-3 auth-form"  id="forget_password_form">
     	  @csrf
          <div class="form-title">
             FORGET PASSWORD
          </div>

		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email"  placeholder="Enter email">
		
			@if($errors->any('email'))
				<span class="text-danger">{{$errors->first('email')}}</span>
			@endif
		  </div>

		   <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Have an account <a href="{{route('getLogin')}}">sign in</a> </div>


	</form>	
</div>
@endsection