@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
<div class="container">
        <div class="center userdetails_Userdetailsheading">
            <h2>User detils</h2>
        </div>
        <div class="row">
            <form class="col s12" method = "post" action = "{{ route('customer.order.store') }}">
            	{{csrf_field() }}
            <div class="row">
            	<input type = "hidden" value = "{{$request->input('brand',null)}}" name = "brand">
            	<input type = "hidden" value = "{{$request->input('product',null)}}" name = "product">
            	<input type = "hidden" value = "{{$request->input('diagnose',null)}}" name = "diagnose">
            </div>
         
            
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="Address" name = "address" type="text" class="validate" required="">
                    <label for="Address">Add your Address</label>
                    <span class="helper-text">House number, locality, ZIP code, city, State</span>
                </div>
                 <div class="input-field col l6 s12">
                   <input id="DYL" type="text" class="validate" required="">
                   <label for="DYL"><i class="material-icons">adjust</i> Current location</label>
                </div> 
            </div>
            <div class="row">
                  <div class="input-field col l6 s12">
                  <input type="text" class="datepicker" id = "date" required="" name = "date" class="validate">
                   <label for="date"><i class="material-icons">date_range</i> Select Date</label>
                </div> 
                  <div class="input-field col l6 s12">
                    <input type="text" id = "time" name = "time" required=""  class="timepicker">
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

<script>
              $(document).ready(function(){
    $('.datepicker').datepicker();
  });
        
  $(document).ready(function(){
    $('.timepicker').timepicker();
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