@extends('layouts.admin.layout')
@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')

@section('content')
    <div class="content" ng-controller="product_diagnose_list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">All Diagnose Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Diagnose</th>
                                    <th>Maket Price</th>
                                    <th>Our Price</th>
                                    <th>Repair Type</th>
                                    <th>Action</th>
                                    </thead>
                                @foreach($output as $data)
                                    <tr>
                                        <td> {{$data['id']}} </td>
                                        <td>
                                        {{$data->product['name']}}
                                        </td>
                                         <td> {{$data->diagnose['name']}}  </td>
                                        <td>  {{$data['market_price']}} </td>
                                        <td>{{$data['price']}} </td>
                                        <td>{{$data['repair_type']}} </td>
                                        <td>
                                            <a   class = "btn btn-sm btn-primary" href = "{{ route('managment.product.diagnose.edit', $data->id) }}"> Edit</a>

                        {!! Form::open(array('route' => ['managment.product.diagnose.destroy',$data['id']], 'method' => 'DELETE')) !!}
                                            <button type  = "submit" class="btn btn-sm btn-danger"> Delete</button>
                                            {!! Form::close() !!}
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
        app.controller('product_diagnose_list', function($scope){

        });
    </script>
@endpush