@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')

<div class="container-fluid">
    <div class="row">
            <div class="carousel carousel-slider center">
                <div class="carousel-fixed-item center">
                    <a class="btn waves-effect waves-light btn-small ">Fix your Issue</a>
                </div>
                <div class="carousel-item red white-text" href="#one!" style="background-image: url('https://s3n.cashify.in/bannerImage/xhdpi/xhdpix1.jpg'); background-size: cover;">
                    <h2>First Panel</h2>
                    <p class="white-text">This is your first panel</p>
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                    <h2>Second Panel</h2>
                    <p class="white-text">This is your second panel</p>
                </div>
                <div class="carousel-item green white-text" href="#three!">
                    <h2>Third Panel</h2>
                    <p class="white-text">This is your third panel</p>
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                    <h2>Fourth Panel</h2>
                    <p class="white-text">This is your fourth panel</p>
                </div>
                </div>
    </div>
</div>


<div class="container welcomeContainer">
<div class="row">
    <div class="col s6">
        <div class="welcomeNoteText">
            <h3>Welcome to Techmans</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                At iste maiores magnam in debitis illum, quisquam voluptatibus quis
                officiis natus consectetur facere aut dignissimos excepturi molestiae,
                ullam quo libero ea.
            </p>
        </div>
    </div>
    <div class="col s6">
        <div class="welcomeMedia">
            <div class="youtubeVideo">
                <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>

            </div>
        </div>
    </div>
</div>
</div>

 <!-- servces your mobile -->
 <div class="container-fluid RepairContainer">
        <div class="row center">
            <div class="col l4 s12">
                <div class="services services1">
                    <div class="screen">
                        <img src="{{asset('frontend_assets/img/icon/cracked-screen.svg') }}" alt="">
                        <p>Service One</p>
                    </div>
                </div>
            </div>
            <div class="col l4 s12">
                <div class="services services3">
                    <div class="screen">
                      <img src="{{asset('frontend_assets/img/icon/cracked-screen.svg') }}" alt="">
                      <p>Services Two</p>
                    </div>
                </div>
             </div>
             <div class="col l4 s12">
               <div class="services services3">
                    <div class="screen">
                      <img src="{{asset('frontend_assets/img/icon/cracked-screen.svg') }}" alt="">
                      <p>services Three</p>
                    </div>
               </div>
            </div>
        </div>
    </div>
  <section class="whyChsUs">
    <div class="container center">
      <div class="center sectionheadin">
        <h4>Why choose TECHMEN</h4>
      </div>
      <div class="row">
        <div class="col l6 s6">
         <a class="waves-effect cutomebuttom">REPAIR ONLINE</a>
        </div>
        <div class="col l6 s6">
         <a class="waves-effect cutomebuttom">VISITE STORE</a>
        </div>
      </div>
      <div class="row">
         <div class="col l3 s12">
           <div class="cardDiv center">
             <img src="{{asset('frontend_assets/img/others/repair.png') }}" alt="repair">
              <h5>Book Your Repair</h5>
              <p>View Prices upfront and book repair online</p>
           </div>         
         </div>
         <div class="col l3 s12">
           <div class="cardDiv center">
             <img src="{{asset('frontend_assets/img/others/delivery-boy.gif') }}" alt="repair" class="responsive-img">
              <h5>Free Pickup</h5>
              <p>View Prices upfront and book repair online</p>
           </div>         
         </div>
         <div class="col l3 s12">
           <div class="cardDiv center">
             <img src="{{asset('frontend_assets/img/others/repair.png') }}" alt="repair">
              <h5>Dianosis & Repair</h5>
              <p>View Prices upfront and book repair online</p>
           </div>         
         </div>
         <div class="col l3 s12">
           <div class="cardDiv center">
             <img src="{{asset('frontend_assets/img/others/pay.gif') }} " alt="pay" class="responsive-img">
              <h5>Recive & Pay Cash</h5>
              <p>View Prices upfront and book repair online</p>
           </div>         
         </div>
      </div>
    </div>
  </section>
@endsection