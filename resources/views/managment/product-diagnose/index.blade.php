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
                            <h4 class="card-title">{{$product['name']}} Diagnose Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                <a href = "{{route('managment.product.diagnose.create',$product['id'])}}" type="button" class="pull-right btn btn-primary" >Add {{$product['name']}}  Diagnose</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Diagnose</th>
                                    <th>Maket Price</th>
                                    <th>Our Price</th>
                                    <th>Edit</th>
                                    </thead>
                                @foreach($product->productDignose as $data)
                                    <tr>
                                        <td> {{$data['id']}} </td>
                                        <td>
                                        @if($data['diagnose_level_id'] > 0)
                                             {{$data->diagnoseLevel['name']}}
                                         @else
                                             {{$data->diagnose['name']}}
                                        @endif
                                        </td>
                                        <td>  {{$data['market_price']}} </td>
                                        <td>{{$data['price']}} </td>
                                        <td>
                                            <a   class = "btn btn-sm btn-primary" href = ""> Edit</a>


                                            <a class="btn btn-sm btn-danger"> Delete</a>
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