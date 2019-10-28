@extends('layouts.admin.layout')
@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Region Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                            </div>
                            <div class="table-responsive">
                            @can('create', App\Models\Region::class)
                            <a type="button" class="btn btn-primary" href="{{route('managment.region.create')}}">Add Region</a>
                            @endcan
                              
                             
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Pin Code</th>
                                    <th>Edit</th>
                                    </thead>
                                    @foreach($allRegion as $region)
                                    <tr >
                                        <td> {{$region['id']}} </td>
                                        <td>{{$region['name']}} </td>
                                        <td>{{$region['pincode']}} </td>
                                        <td>
                                        @can('update', App\Models\Region::class)
                                         <a class = "btn btn-sm btn-primary" href="{{route('managment.region.edit', $region->id)}}"> Edit</a>
                                        @endcan     

                                        @can('delete', App\Models\Region::class)

                                           {{ Form::open(array('route' => ['managment.region.destroy','id' => $region['id'] ], 'method' => 'DELETE') ) }}
                                            <button type = "submit" class = "btn btn-sm btn-danger" > Delete</button>
                                            
                                            {{Form::close() }}
                                            @endcan
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
@endsection
