<!DOCTYPE html>
<html>
  <head>
    <title>Welcome In Tech'Man</title>
  </head>
  <body>
    <h2>Welcome to the site {{$customer['name']}}</h2>
    <br/>
    Your registered email-id is {{$customer['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('customer/verify', $customer->verification_token)}}">Verify Email</a>
  </body>
</html>