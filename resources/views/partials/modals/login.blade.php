 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
         <div >
     <form action="{{route('postLogin')}}" method="POST"   id="modal_login_form">
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
       <div><button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; Don't have an account <a class="register_button" href="javascript:void(0)">sign up</a> here</div>

       <div> <a href="{{route('getForgetPassword')}}">Forget Password</a></div>

  </form> 
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
