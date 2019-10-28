@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
  <main>
      <div class="container">
        <!--
        <h5 class="align-center header">
           Please login
        </h5>
        -->
        
        <div class="center-align">
        <div class="card login hoverable">
          <div class="card-image">
            <img src="http://techmen.in/frontend_assets/img/icon/logo.png" class="TechmenLogin_Logo responsive-img">
          </div>
          <div class="card-action">
            <a href="#" class="active green-text">Login</a>


            <a href="/customer/register" class="grey-text">Register</a> 
          </div>
          <div class="card-content">
          
          <form method="post" action = "{{route('customer.login')}}" class="col s12">
            {{csrf_field()}}
            <div class="row">

               <div class="input-field col s12">
                <input id="name" name = "name" type="text" required class="validate">
                      <label for="name">Enter Your Name</label>
              </div>

              <div class="input-field col s12">
                <input id="phone" type="number" required name = "phone" class="validate">
                      <label for="phone">Enter Mobile Number</label>
              </div>
 
             
            </div>

              <div class="row center-align">
                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect green">Login</button>
              </div>

          </form>
        </div>
          </div>

        </div>
        
      </div>

 
  </main>


@endsection