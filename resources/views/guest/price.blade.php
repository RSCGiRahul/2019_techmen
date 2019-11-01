@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
 <!-- form for Mobile details -->
 <div class="container" ng-controller = "price-controller">
      <div class="row center mobileRepairEnquiryRow">        
        <div class="col l6 s12">
          <div class="MobilesideText">
            <h4>Life isn’t in order when your phone is out of order!</h4>
            <p>No more waiting or giving phone away at repair shops. Enjoy convenient mobile repair service at your door step.
                It’s as easy as 1-2-3.
                </p>
          </div>
        </div>
        
        <div class="col l6 s12">
          <div class="fomOfMobile">
            <div class="titleNameForm center">
                <h6>Mobile Repair at your Doorstep. 
                    7 Days a Week</h6>
              </div>
              <div class="mobileRepairEnquiryForm">
                <form action="{{ route('order.auth') }}" method="post">
                {{csrf_field() }}
                    <div class="input-field col s12">
                     
                        <select
                        name = "brand"
                        onChange = "getbrandProduct()"
                        id = "brands_option"
                        class="validate" required="" aria-required="true"
                        >
                          <option value="" disabled selected>Choose your Product</option>
                          @foreach($outputs as $output)
                            <option value = "{{$output->id}}"> {{$output->name}} </option>
                          @endforeach
                       
                        </select>
                         
                      </div>
            
                      <div class="input-field col s12">
                         <select name = "product"
                         class="validate" required="" aria-required="true"
                            id = "product_option">
                         <option value="" disabled selected>Choose your Model</option>
                         </select>
                       </div>
         
                       <!--  <div class="input-field col s12">
                              <select name="diagnose" id="diagnose_option">
                              <option value="" disabled selected>Choose Diagnose</option>
                              </select>
                          </div> -->
                          <button class="btn waves-effect waves-light btn-small sumitmobiledetails" type="submit">Submit
                              <i class="material-icons right">send</i>
                          </button>
                
               
                </form>
              </div> 
            </div>   
        </div>
      </div>
    </div>
@endsection

@push('angular')
<script>
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
 function getbrandProduct(){
 
    var opt = $("#brands_option").val();
    $.ajax({
      url : "guest/product/"+opt,
      type : 'GET',
      success : function(data){
        $("#product_option").html(data);
          setTimeout(function(){
            $('select').formSelect();
            // productDiagnose();
          },100);
          
      }
    });
  }

  // function productDiagnose(){
  //   var opt = $("#product_option").val();
  //   $.ajax({
  //     url : "guest/product-diagnose/"+opt,
  //     type : 'GET',
  //     success : function(data){
  //       $("#diagnose_option").html(data);
  //         setTimeout(function(){$('select').formSelect();},100);
  //     }
  //   });
  // }
  </script>
@endpush