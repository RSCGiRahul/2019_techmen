@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content"  ng-controller = "inventory_add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Inventory</h4>
                            <p class="card-category">Add new entry</p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ('managment.inventory.store'), 'method' => 'Post')) !!}


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('per_unit_price', 'Per Unit Price', ['class' => 'bmd-label-floating']) !!}

                                    {!! Form::number('per_unit_price', old('per_unit_price'), ['class' => 'form-control', 'ng-model' => 'per_unit_price' , 'ng-Change' => 'checkFullPrice()','step'=>'any']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('quantity', 'Enter Quantity', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::number('quantity', old('quantity'), ['class' => 'form-control','ng-model' => 'quantity', 'ng-Change' => 'checkFullPrice()']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('total_price', 'Total Price', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::number('total_price', 1200, ['class' => 'form-control', 'disabled', 'ng-model' => 'total_price','step'=>'any']) !!}
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
        app.controller('inventory_add', function($scope){
            $scope.total_price = 1200;
            console.log($scope.total_price);
            $scope.checkFullPrice = function()
            {
                $scope.total_price = $scope.per_unit_price * $scope.quantity;
            }
        });
    </script>
@endpush