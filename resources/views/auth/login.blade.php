<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
   
   <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <p class="tip">Welcome Techman Admin</p>
<div class="cont">
    <div class="form sign-in">
      <form method="POST" action="{{ route('login') }}">
      @csrf
        <h2>Welcome User</h2>
        <label>
        <span>Email</span>
        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </label>
        


        <label>
        <span>Password</span>
        <input type="password"  name="password" required autocomplete="current-password" />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </label>
      

        <a class="forgot-pass" href="#">Forgot password?</a>
            <button type="submit" class="submit">
                Login
            </button>
        <!-- <a href="/dashboard.html"><button type="button" class="submit">Login</button></a> -->
        </form> 
    </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <!-- <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Login</span>
      </div> -->
    </div>
    <div class="form sign-up">
    <form method="POST" action="{{ route('register') }}">
                        @csrf
      <h2>Time to feel like home,</h2>
      <label>
        <span>NAME</span>
        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </label>
     

      <label>
        <span>Email</span>
        <input type="email" id="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </label>

      <label>
        <span>Password</span>
        <input type="password"  id="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </label>

      <label>
        <span>CONFIRM Password</span>
        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
      </label>
     <button type="submit" class="submit">Sign Up</button> 
     </form>
    </div>
  </div>
</div>

<a href="#" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="#" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
<script>
  document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});
</script>
</body>
</html>