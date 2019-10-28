@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="create_product_diagnose" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add  Product Price</h4>
                            <p class="card-category">Add new Product Price</p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.product.diagnose.store', 'id' =>  $product->id], 'method' => 'Post')) !!}
                            <input type="hidden" name="diagnose_level_id" value = "{{$parent_id}}">
                            <input type="hidden" name="diagnose_id" value = "{{$diagnose_id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('market_price', 'Market Price', ['class' => 'bmd-label-floating']) !!}

                                    {!! Form::number('market_price' , old('market_price'),['class' => 'form-control', 'id' => 'market_price']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('price', 'Price', ['class' => 'bmd-label-floating']) !!}

                                    {!! Form::number('price' , old('price'),['class' => 'form-control', 'id' => 'price']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('price', 'Price', ['class' => 'bmd-label-floating']) !!}

                                    <select class="form-control select2 " name = "venue" >
                                        <option value = "1"> Both Venue </option>
                                        <option value = "2"> On-office Venue</option>
                                        <option value = "2">  On-Site Venue</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('description', 'Description', ['class' => 'bmd-label-floating']) !!}

                                    {!! Form::textarea('description' , old('description'),['class' => 'form-control', 'id' => 'price']) !!}
                                </div>
                            </div>


                            <div class="clearfix"></div>


                            <button type="submit" class="btn btn-primary pull-right" >Save</button>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('angular')
    <script>
        $(document).ready(function(){

        });
        app.controller('create_product_diagnose', function($scope,$http){

        });
    </script>
@endpush