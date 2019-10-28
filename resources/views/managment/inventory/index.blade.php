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
                            <h4 class="card-title">Inventory Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                <a href="{{route('managment.inventory.create')}}" class="btn  btn-primary"> Add Inventory</a>
                            </div>
                            <div class="table-responsive">

                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Edit</th>
                                    </thead>
                                    @foreach($datas as $data)
                                    <tr>
                                        <td> {{$data['id'] }} </td>
                                        <td> {{ $data['name'] }} </td>
                                        <td> {{ $data['per_unit_price'] }} </td>
                                        <td> {{ $data['quantity'] }} </td>
                                        <td> {{ $data['total_price'] }} </td>
                                        <td>
                                            <a class = "btn btn-sm btn-primary" href = "{{route('managment.inventory.edit', ['id' => $data['id']])}}"> Edit</a>
                                          {{--{!!  Form::open(array('route'=> ['managment.inventory.destroy', 'id' => $data['id']],'method' => 'DELETE'))!!}--}}
                                            {!! Form::open(array('route' => ['managment.inventory.destroy', 'id' => $data['id']], 'method' => 'DELETE')) !!}
                                            <button type = "submit"  class = "btn btn-sm btn-danger" > Delete</button>
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
@endsection

@push('angular')
    <script>

    </script>
@endpush