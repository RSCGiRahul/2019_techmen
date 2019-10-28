@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="edit_diagnose_level" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update Diagnose</h4>
                            <p class="card-category">Update entry</p>

                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => array('managment.diagnose.level.update', $id ), 'method' => 'Post')) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::text('name', $editData['name'], ['class' => ' form-control']) !!}
                                    </div>
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
        app.controller('edit_diagnose_level', function ($scope,$http) {

        })
    </script>

@endsection
