@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="add_diagnose_level" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add {{($diagnose->diagnoseLevel && isset($diagnose->diagnoseLevel[0])) ? ($diagnose->diagnoseLevel['name']) : $diagnose->name}} Diagnose</h4>
                            <p class="card-category">Add new entry</p>

                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => array('managment.diagnose.level.store', $id , ($catid) ? $catid: ''), 'method' => 'Post')) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'bmd-label-floating']) !!}
                                        {!! Form::text('name[]', old('name'), ['class' => ' form-control']) !!}
                                    </div>
                                </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-sm btn-primary add_more_btn" type="button" ng-click = "addMore()"> Add More</button>
                                        </div>

                                </div>
                            </div>


                            <div id = "add_more_diagnose_level">

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

    <script>
        app.controller('add_diagnose_level', function ($scope,$http) {
                $scope.addMore = function()
                {

                    $http({
                        url:"{{route('managment.diagnose.addmore')}}",

                        method: "GET",
                        type : 'HTML',
                    }).then(function (response) {
                        var myEl = angular.element( document.querySelector( '#add_more_diagnose_level' ) );
                        myEl.prepend(response.data);

                        console.log(response.data);

                    }).
                    {{--$http.get("{{route('managment.diagnose.addmore')}}")--}}
                    {{--.then(function (response){--}}
                    {{--console.log(response);--}}
                    {{--}).--}}
                    catch(function(response) {

                    }).finally(function() {
                        console.log("Task Finished.");
                    });
                }
            })
    </script>

@endsection
