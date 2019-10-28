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
                            <h4 class="card-title">Products Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                   <a href = "{{route('managment.product.create')}}" type="button" class="pull-right btn btn-primary" >Add Product </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Diagonse</th>
                                    <th>Edit</th>
                                    </thead>
                                    @foreach($products as $product)
                                    <tr>
                                        <td> {{ $product->id }} </td>
                                        <td> {{ $product->name }} </td>
                                        <td> {{ $product->brand->name }} </td>
                                        <td> <a href="{{route('managment.product.diagnose',  $product->id)}}" class="btn btn-sm btn-primary">Diagnose</a> </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href = "{{route('managment.product.edit',['id' => $product->id])}}">Edit </a>
                                            {{ Form::open(array('route' => ["managment.product.destroy", $product->id ], 'method' => 'DELETE' ) )}}
                                            <button type = "submit"  class="btn btn-sm btn-danger" >Delete </button>
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