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
                            <h4 class="card-title">Coupen Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                <a href="{{route('managment.coupen.create')}}" class="btn btn-primary"> Add Coupen</a>
                            </div>
                            <div class="table-responsive">

                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Product</th>
                                    <th>Region</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                    </thead>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td> {{$data['id'] }} </td>
                                            <td> {{ $data['name'] }} </td>
                                            <td> {{ $data['code'] }} </td>
                                            <td> {{ $data['discount'] .' '.$data['type'] }} </td>
                                            <td>
                                             @if( $data['all_product'] != App\Models\Coupen::AllProduct )
                                                <a href = "">
                                                 {{ $data['all_product'] }}
                                                </a>
                                            @else
                                                    {{ $data['all_product'] }}
                                             @endif
                                            </td>
                                            <td>
                                                @if( $data['all_region'] != App\Models\Coupen::AllRegion)
                                                    {{ $data['all_region'] }}
                                                @else
                                                    {{ $data['all_region'] }}
                                                @endif
                                            </td>
                                            <td> {{ $data['end_date'] }} </td>
                                            <td>
                                                <a class = "btn btn-sm btn-primary" href = "{{route('managment.coupen.edit', ['id' => $data['id']])}}"> Edit</a>

                                                {!! Form::open(array('route' => ['managment.coupen.destroy', 'id' => $data['id']], 'method' => 'DELETE')) !!}
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