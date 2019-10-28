@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')


  <div class="container PriceDetailsContainer">
        <div class="row pricePageHeading">
            <div class="col s8">
                <h5 class="MobileNme"> {{ucwords($product->name)}}</h5>
            </div>
            <div class="col s4">
               <span class="totalNAmeCart"> <i class="large material-icons TotalCart">add_shopping_cart</i> Total Price: <span style="color: #ff2a32;">&#x20b9; <span id = "price"> 0.00 </span></span> </span>
            </div>
        </div>
        <div class="row">
        	<form action = "{{route('customer.order.store')}}" method="POST" >
        		{{csrf_field()}}
        		<input type ="hidden" name = "product_id" value = "{{$product->id}}">
	        	@foreach($diagnoses as $diagnose)
	            <div class="col l3 s6">
	                <div class="card serviceCard">
	                    <div class="ServiceCardForm">
	                    	  <!-- <input type = "hidden" class = "amount" value = "{{$diagnose->price}}"/> -->
	                        <p>
	                          <label>
	                            <input type="checkbox" name = "diagnose[{{$diagnose->id}}]" data-price = "{{$diagnose->price}}" value = "{{$diagnose->id}}" class = "diagnose_price" />

	                            <span class="serviceName">{{$diagnose->diagnose->name}}</span>
	                          </label>
	                        </p>
	                        <p class="serviceRate">&#x20b9; {{$diagnose->price}}</p>
	                    </div>  
	                    <div class="ICON">
	                        <img class="PriceIcon" src="{{asset('frontend_assets/img/icon/mobile-screen.svg')}}">
	                    </div>
	                </div>
	            </div>
	            @endforeach
	            <button class="btn waves-effect waves-light btn-small sumitmobiledetails primaryButton" type="submit">Proceed
                              <i class="material-icons right">send</i>
              </button>
             </form>
              
          </div>
          
          <div class="row center">
             
          </div>
    </div>

@endsection

@push('custom_js')
<script type="text/javascript">
	$(document).ready(function(){
		var totalAmount = 0;
		$(".diagnose_price:checkbox").click(function(){
			if($(this).prop('checked') == true){
				totalAmount = parseInt(totalAmount)+ parseInt($(this).data('price'));
			}
			else{
				totalAmount = parseInt(totalAmount) - parseInt($(this).data('price'));
			}
			$("#price").text(totalAmount);
		});
	});

</script>

@endpush