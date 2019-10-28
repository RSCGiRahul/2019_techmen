@extends('layouts.admin.layout')
@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')

@section('content')
    <div class="content" ng-controller="gadget_list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Order Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                   
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Diagnose</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    </thead>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td> {{ $order->id }} </td>
                                        <td> {{ $order->customer->name }} </td>
                                        <td> {{ $order->customer->phone }} </td>
                                        <td> {{ $order->address->address }} </td>
                                        <td> {{ count($order->orderDiagnose) }} </td>
                                        <td>
                                           {{$order->price}}
                                        </td>
                                           <td> 
                                            {{$order->customer_date.' '.$order->customer_time}}
                                        </td>
                                         <td> 
                                            Pending
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
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