@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" ng-controller="add_product" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Product</h4>
                            <p class="card-category">Add new entry</p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.product.update',  'id' => $output['id']], 'method' => 'PUT')) !!}


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('brand', 'Select Brand', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::select('brand_id', $brands , $output['brand_id'], ['class' => 'select2 form-control']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">

                                    {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('name' , $output['name'],['class' => 'form-control', 'id' => 'name']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{--<label class="bmd-label-floating"> start typing.</label>--}}
                                    {{--<textarea class="form-control" rows="5"></textarea>--}}
                                    {!! Form::label('description', 'Give Discrption', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::textarea('description', $output['description'], ['rows' => '5', 'class' => 'form-control']) !!}
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

    </script>
@endpush