@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="add_diagnose" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Diagnose</h4>
                            <p class="card-category">Edit entry</p>

                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.diagnose.update', $id], 'method' => 'PUT')) !!}


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('name' , $editData['name'],['class' => 'form-control', 'id' => 'name']) !!}
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        app.controller('add_diagnose', function ($scope,$http) {

        })
    </script>

@endsection
