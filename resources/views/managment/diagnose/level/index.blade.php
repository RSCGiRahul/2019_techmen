@extends('layouts.admin.layout')
@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')

@section('content')
    <div class="content" ng-controller="gadget_list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> {{($diagnose->diagnoseLevel && isset($diagnose->diagnoseLevel[0])) ? ($diagnose->diagnoseLevel[0]['name']) : $diagnose->name}}  Cateogry Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                <a type="button" href = "{{route('managment.diagnose.level.create', $paramaters)}}" class="pull-right btn btn-success btn-sm" >Add  {{($diagnose->diagnoseLevel && isset($diagnose->diagnoseLevel[0])) ? ($diagnose->diagnoseLevel[0]['name']) : $diagnose->name}} Categorddy</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Sub Categories</th>
                                    <th>Edit</th>
                                    </thead>
                                    @foreach($diagnose->diagnoseLevelByParent as $data)
                                        <tr>
                                            <td> {{$data['id'] }}</td>
                                            <td> {{$data['name'] }}</td>
                                            <td> <a href = "{{route('managment.diagnose.level.index', array('id'=>$diagnose['id'], 'catid' => $data['id']))}}" class="btn btn-danger btn-sm"> Sub Category </a></td>
                                            <td>
                                                <a href = "{{route('managment.diagnose.level.edit',[$diagnose['id']])}}" class = "btn btn-sm btn-primary" type = "button" > Edit</a>
                                                {!! Form::open(array('route' => array('managment.diagnose.level.destroy',  $data['id']), 'method' => 'PUT')) !!}
                                                <button type="submit" class="btn btn-sm btn-danger"> Delete</button>
                                                {!! Form::close() !!}
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

    <script>
        app.controller('gadget_list', function ($scope) {

        })
    </script>

@endsection


