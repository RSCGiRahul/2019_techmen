@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
<div class="container">

 
        <div class="center userdetails_Userdetailsheading">
            <h2>User detils</h2>
        </div>
        <div class="row">
            <form id = "validate_form" class="col s12" action = " {{route('customer.registration')}}" method="POST">
              @csrf
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="First_name" type="text" name = "name" class="validate" required>
                    <label for="First_name"> Name</label>
                </div>

                <div class="input-field col l6 s12">
                    <input id="email" name = "email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
              
                <div class="input-field col l6 s12">
                        <input id="Mobile" type="number" name = "phone" class="validate">
                        <label for="Mobile">Mobile Number</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col l6 s12">
                    <select name = "region"  id="Region">
                       <option> Select Region </option>
                      @foreach($regions as $key => $region)
                        <option @if(Cookie::get('city') && $key == Cookie::get('city')) selected @endif value = "{{$key}}">  {{ $region }} </option>
                      @endforeach
                      
                    </select>
                    <label for="Region">Select Region</label>
                    <!-- <span class="helper-text">House number, locality, ZIP code, city, State</span> -->
                </div>

                
            </div> 
            <div class="row">
                <div class="col s6">
                  <button class="btn waves-effect waves-light right sumitmobiledetails" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>                                    
                </div>
             
                 
            </div>                                   
        </form>
        </div>
    </div>

    @endsection

    @push('custom_js')
        <script type="text/javascript">
       
function toast() {
    Materialize.toast('Message recieved', 1000);  
}   
$(document).ready(function(){ 
    toast();
        $("#validate_form").validate({
          rules: {
            // simple rule, converted to {required:true}
            name: "required",
            email: {
              required: true,
              email: true
            },name: "required",
            phone: {
               required: true,
                maxlength: 12
            },
            region: "required",
          }
        });
        });
        </script>
    @endpush