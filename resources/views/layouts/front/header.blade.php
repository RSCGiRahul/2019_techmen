@section('header')
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name = "csrf-token" content = "{{csrf_token() }}"/>
    <title>Techman</title>
    @include('layouts.front.fetch_css')
</head>
<body ng-app = "front-app">
<nav class="nav-extended">
    <div class="nav-wrapper">

        <a href="#" class="brand-logo">Logo

        </a> 
    <a href="{{route('guest.region')}}" style= "margin-left:120px">
       <?php
       echo   App\helpers\tableHelper::getBrowserRegion();

 $name = "User Login";
 if(Auth::check()  || Auth::guard('customer')->check()){
   if(Auth::check()){
     $name = Auth::user()->name;
   }else{
    $name = Auth::user('customer')->name;
   }
 }
      ?>
     </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down TachmannavLinks">
        
        <li><a href="{{route('price')}}">View price</a></li>
            <li><a href="{{route('aboutus')}}">About Us</a></li>
            <li><a href="{{route('contactus')}}">Contact us</a></li>


            <!--Login Dropdown Trigger -->


            <a class='waves-effect waves-light btn-larg dropdown-trigger btn' href='#' data-target='dropdown1'><i class="material-icons left">account_box</i>{{str_limit($name,12)}}</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                @if(Route::has('login'))
                    
                    @if(Auth::check()  || Auth::guard('customer')->check())
                        <li>
                            @if(Auth::guard('customer')->check())
                            <a  class="modal-trigger" href="{{route('customer.order.index')}}">Dashboard</a>
                            @else
                            <a  class="modal-trigger" href="/managment">Dashboard</a>
                            @endif
                        </li>
                        <!-- <li><a href="#!">Account setting</a></li> -->
                        <li>
                            <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                         </li>       

                    @else
                       {{--  <li><a  href = "{{route('login')}}">Login</a></li> --}}
                       <li><a  class="modal-trigger" href="#modal1">Login</a></li>
                     @endif
                 @endif
            </ul>
        </ul>
    </div>
</nav>
<!-- mobile menu -->
<ul class="sidenav" id="mobile-demo">
    <li><a href="#">About Us</a></li>
    <li><a href="#">Contact us</a></li>
    <!-- <li><a href="#" class="waves-effect waves-light btn modal-trigger" href="#modal1">Login</a></li> -->
</ul>
@endsection