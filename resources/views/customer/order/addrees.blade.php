@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')

<div class="container">
        <div class="center userdetails_Userdetailsheading">
            <h2>User detils</h2>
        </div>
        <div class="row">
            <form id = "validate_form" class="col s12" method = "post" action="{{route('customer.place-order')}}">
            	{{csrf_field()}}
            <div class="row">
            	<input type = "hidden" value = "{{$product}}" name = "product">
            	<input type = "hidden" value = "{{$diagnose}}" name = "diagnose">

                
            </div>
            <div class="row">
                <div class="input-field col l6 s12">
                    <input  name = "address" id = "address" type="text" class="validate">
                    <label for="address">Add your Address</label>
                    <span class="helper-text">House number, locality, ZIP code, city, State</span>
                </div>
                 <div class="input-field col l6 s12">
                   <input id="location" name = "location" type="text" class="validate">
                   <label for="location"><i class="material-icons">adjust</i> Current location</label>
                </div> 
            </div>
            <div class="row">
                  <div class="input-field col l6 s12">
                  <input type="text" name = "date" id = "date" class="datepicker" class="validate">
                   <label for="date"><i class="material-icons">date_range</i> Select Date</label>
                </div> 
                  <div class="input-field col l6 s12">
                    <input type="text" name = "time" id = "time" class="timepicker">
                   <label for="time"><i class="material-icons">access_time</i> Select Time</label>
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
	    $(document).ready(function(){
        // toast();
    $('#date').datepicker(
      {
       min: new Date(2018,10,27),
      }
      );
     $('.timepicker').timepicker();

     $("#validate_form").validate({
          rules: {
            // simple rule, converted to {required:true}
            address: "required",minlength: 5 ,maxlength: 30 ,
            location: {
              required: true,
            },
            date: "required",
            time: {
               required: true,
            },
          }
        });


  });
      

        

  $('#DYL').on('click', function() {
    $('.DYL').geolocate({
        'components': [
            'locality',
            'administrative_area_level_1',
            'postal_code'
        ],
        'name': 'short_name',
        'delimeter': ' | '
    });
});

</script>

@endpush