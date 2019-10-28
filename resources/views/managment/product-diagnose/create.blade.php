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
                            <h4 class="card-title">Add {{$product->name}} Diagnose</h4>
                            <p class="card-category">Add new dignose</p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.product.diagnose.store',$product->id], 'method' => 'Post')) !!}


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('dignose', 'Select Diagnose', ['class' => 'bmd-label-floating']) !!}
                                    <select class="form-control select2 diangose_heirarchy" name = "diagnose_id" >
                                        @foreach($diagnoses as $dignoseKey => $diagnoseValue)
                                            <option value = "{{$dignoseKey }}"> {{$diagnoseValue}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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


                            <button type="submit" class="btn btn-primary pull-right" name = "next">Save</button>
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
            {{--$(".diangose_heirarchy").on("change", function(e){--}}
                {{--$.ajax({--}}
                    {{--url :"{{route('managment.product.diagnose.level')}}",--}}
                    {{--type: 'HTML',--}}
                    {{--method : 'GET',--}}
                    {{--data : {--}}
                        {{--level :0,--}}
                        {{--diagnose  : $(this).val(),--}}
                    {{--},--}}
                     {{--success:function(response){--}}
                        {{--console.log(response);--}}
                             {{--$("#append_diagnose").append(response);--}}
                        {{--},--}}
                    {{--error:function(e){--}}

                {{--}--}}
                {{--});--}}
            {{--});--}}
        });
        app.controller('create_product_diagnose', function($scope,$http){


            {{--$scope.diagnoseLevel = function (levelId = 0){--}}
                {{--$http({--}}
                    {{--url: "{{route('managment.product.diagnose.level')}}",--}}
                    {{--method: "GET",--}}
                    {{--params: {level:levelId, diagnose: $scope.diagnoseId}--}}
                {{--})--}}
                    {{--.then(function(response){--}}
                      {{--document.getElementById("append_diagnose").append(response.data);--}}

                    {{--});--}}
            {{--}--}}
        });
    </script>
@endpush