@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
  <!--hero section  -->
       <div class="container-fluid">
            <div class="row">
                    <div class="carousel carousel-slider center">
                    <div class="carousel-item blue white-text" href="#four!">
                        <h1>Contact Us</h1>                   
                    </div>
                    </div>
            </div>
       </div>
       <div class="container">
           <div class="row">
            <div class="col l5 s12 companydetails">
                <div class="contactdetails">
                   <div class="emailsCard">
                       <h6><i class="material-icons">drafts </i>Email:</h6>
                       <p><strong>example@gmail.com</strong></p>
                   </div>
                   <div class="PhoneNumber">
                        <h6><i class="material-icons">call</i> Contact number:</h6>
                       <p><strong>+91 9847563746</strong></p>
                    </div>
                </div>
            </div>
            <div class="col l7 s12 contactFrom">
                <div class="center">
                    <h5>How Can we help you?</h5>
                </div>
               <div class="contctInput">
                    <div class="input-field">
                            <input id="First_name" type="text" class="validate" required>
                            <label for="First_name">First Name</label>
                    </div>
                    <div class="input-field">
                        <input id="last_name" type="text" class="validate" required>
                        <label for="last_name">last Name</label>
                    </div>
                    <div class="input-field">
                        <input id="email" type="email" class="validate" required>
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s12">
                        <select>
                            <option>What do you need help with?</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>                       
                    </div>
               </div>
               <button class="btn waves-effect waves-light btn-small sumitmobiledetails" type="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
           </div>
       </div>
 
@endsection