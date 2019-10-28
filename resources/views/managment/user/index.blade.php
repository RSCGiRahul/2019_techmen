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
                        <h4 class="card-title">Users Table</h4>

                        <p class="card-category"> </p>

                    </div>
                    <div class="card-body">
                        <div class = "pull-right">
                            @can('create-user')
                                <a href="{{route('managment.user.create')}}"> <button class="btn btn-primary"> Add User</button> </a
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Region</th>
                                <th>Email</th>
                                <th>Phone</th>
                                @can('create-user')
                                    <th> Action</th>
                                 @endcan
                                </thead>
                                <tbody>
                                 @foreach($users as $user)
                                    <tr>
                                        <td> {{$user['id']}} </td>
                                        <td> {{$user['name']}} </td>
                                        <td> @if($user->firstRole()) {{$user->firstRole()->name }} @endif  </td>
                                        <td>
                                            @if($region = $user->region->first())
                                               {{ $region->name .'  ' .$user->region->count()}}
                                            @endif
                                        </td>
                                        <td> {{$user['email']}} </td>
                                        <td> {{$user['phone']}} </td>
                                        @can('create-user')
                                        @if($user['id'] != Auth::user()->id)
                                         <td>
                                             <a href="{{route('managment.user.edit', [$user['id']])}}" type = "button" class="btn btn-sm btn-primary">Edit</a>
                                             {!! Form::open(array('route' => ['managment.user.destroy', 'id' => $user['id'] ], 'method' => 'DELETE') )!!}
                                             <button type = "submit" class="btn btn-sm btn-danger">Delete</button>
                                             {!!Form::close() !!}
                                         </td>
                                         @endif
                                         @endcan
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection