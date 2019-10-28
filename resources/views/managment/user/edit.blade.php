@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
<div class="content" ng-controller="region-create">
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
                    
                     @if ($errors->any())
                        @component('components.managment.errors.index', [
                            'errors' => $errors
                            ])
                        @endcomponent
                    @endif
                    {!! Form::open(array('route' => ['managment.user.update', 'id' => $user->id], 'method' => 'PUT')) !!}


                    <!-- input number and text field -->

                                <div class="col-md-6">
                                    <div class="form-group">

                                        {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::text('name' , $user['name'],['class' => 'form-control', 'id' => 'name']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Enter Email', ['class' => 'bmd-label-floating']) !!}
                                        {{--<label class="bmd-label-floating">input number field</label>--}}
                                        {{--<input type="number" class="form-control">--}}
                                        {!! Form::email('email', $user['email'] , ['class' => 'form-control', 'id' => 'email']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::number('phone', $user['phone'], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('role', 'Select Role', ['class' => 'bmd-label-floating']) !!}
                                         <select id ="role" name = "role" class = "form-control select2">
@foreach($allRole as $roleId => $role)
                                            <option @if( in_array($roleId,  $user->roles->pluck('id')->toArray() ))
                                                selected
                                              @endif 
                                              value = "{{$roleId}}"
                                              >
                                              {{$role}}
                                              </option>
@endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('region', 'Select Region', ['class' => 'bmd-label-floating']) !!}
                                        <select id ="region" name = "region" class = "form-control select2" >
                                        @foreach($allRegion as $regionId => $region)
                                            <option
                                            @if( in_array($regionId,  $user->region->pluck('id')->toArray() ))
                                            selected
                                            @endif value = "{{$regionId}}"> {{ $region }}</option>
                                        @endforeach
                                        </select>
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
        app.controller('region-create', function($scope,$http){

        })
    </script>
@endpush