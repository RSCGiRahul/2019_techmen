@extends('layouts.front.app')
@extends('layouts.front.header')
@extends('layouts.front.footer')
@section('content')
 <!-- form for Mobile details -->
 <div class="container" ng-controller = "price-controller">
      <div class="row center mobileRepairEnquiryRow">        
        
        
        <div class="col l12 s12">
          <div class="fomOfMobile">
            <div class="titleNameForm center">
                <h6>Your Previous Order</h6>
              </div>
              <div class="mobileRepairEnquiryForm">
                <table>
                  <thead>
                  <tr>
                    <th> Name </th>
                    <th> Product </th>
                    <th> Date </th>
                    <th>  Price</th>
                  </tr> 
                </thead>
                <tbody>
                  @forelse($outputs as $key => $res)
                    <tr>
                        <td> {{ ++$key }} </td>
                        <td> {{ $res->product['name'] }}  </td>
                        <td> {{$res->customer_date.' '.$res->customer_time}}
                        </td>
                        <td> {{ $res->price }}  </td>

                     
                    </tr>
                    @empty 
                          <tr>
                        <td>  No Order Found </td>
                    </tr>
                    @endforelse
                </tbody>
               </table>
              </div> 
            </div>   
        </div>
      </div>
    </div>
@endsection

@push('angular')
<script>
</script>
@endpush