@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="region-ng" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add User</h4>
                            <p class="card-category">Add new entry</p>
                        </div>
                        <div class="card-body">
                        {!! Form::open(array('route' => ('managment.region.store'), 'method' => 'Post')) !!}

{{-- 
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('role', 'Select State', ['class' => 'bmd-label-floating']) !!}

                                    <select id ="state" name = "state" class = "form-control"
                                            ng-change="selectedItemChanged()"
                                            select2 ng-model="selectedState"
                                            ng-options="key as value for (key , value) in allState " ></select>

                                </div>
                            </div>

                            <div class="col-md-6"  ng-if="selectedState" ng-show="selectedState">
                                <div class="form-group" >
                                    {!! Form::label('district', 'Select District', ['class' => 'bmd-label-floating']) !!}


                                    <select  class = "form-control" name = "district" id = "district" select2
                                        ng-model="selectedDistrict"
                                    >
                                        <option ng-repeat="value in stateDistrict" value = "<@ value.id @>"> <@ value.name @></option>
                                    </select>
                                     </div>
                            </div>
                            --}}

                                <div class="col-md-6">
                                    <div class="form-group">

                                        {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::text('name' , old('name'),['class' => 'form-control', 'id' => 'name']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('pincode', 'Enter Pincode', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::text('pincode', old('pincode'), ['class' => 'form-control', 'id' => 'pincode']) !!}
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
        app.controller('region-ng', function($scope,$http){

        })
    </script>
@endpush