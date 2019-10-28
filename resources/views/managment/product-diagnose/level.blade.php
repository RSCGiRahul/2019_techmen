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
                            <h4 class="card-title">Add  Diagnose</h4>
                            <p class="card-category">Add new dignose</p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.product.diagnose.addPrice', 'id' =>  $product->id], 'method' => 'Post')) !!}

                            <input type="text" name = "diagnose_id" value = "{{$diagnose_id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('dignose', 'Select Diagnose', ['class' => 'bmd-label-floating']) !!}
                                    <select class="form-control select2 diangose_heirarchy" name = "parent_id" >
                                        @foreach($diagnoses as $dignoseKey => $diagnoseValue)
                                            <option value = "{{$dignoseKey }}"> {{$diagnoseValue}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="clearfix"></div>


                            <button type="submit" class="btn btn-primary pull-right" name = "next" value = "1">Next Level</button>
                            <button type="submit" class="btn btn-primary pull-right" name = "price" value ="1">Add Price</button>
                            <button type="submit" class="btn btn-danger pull-right" name = "price" value ="1">Back</button>
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