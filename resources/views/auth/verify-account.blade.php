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
   
  <div class="sub-cont">
  

  <div class="img">
      <div class="img__text m--up">
        <!-- <h2>New here?</h2> -->
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      
    </div>
    <!-- <div class="form sign-up"> -->
    <form method="POST" action="{{ route('account.verification', $token) }}">
                        @csrf
      <h2>Time to feel like home,</h2>
      <label>
        
        <h3> {{$userData['name']}}</h3>
       
      </label>
     

      <label>
      <h3> {{$userData['email']}}</h3>
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
    <!-- </div> -->
  </div>
</div>

<a href="#" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="#" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
<script>
 document.querySelector('.cont').classList.toggle('s--signup');
//   document.querySelector('.img__btn').addEventListener('click', function() {
//   document.querySelector('.cont').classList.toggle('s--signup');
// });
</script>
</body>
</html>