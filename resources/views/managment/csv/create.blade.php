@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Inventory</h4>
                            <p class="card-category">Add new entry</p>
                        </div>

                        <div class="card-body">
                            {!! Form::open(array('route' => ('managment.admin.uploadcsv'), 'method' => 'Post','enctype'=>'multipart/form-data')) !!}


                             @php $fileContent = array('Brand','Model Name', 'Fault', 'Price', 'Offer Price(our price) ', 'Remark'); @endphp       
                            <div class="table-responsive">
                                <table class="table " id="myTable">
                                    <thead class=" text-primary">
                                        @foreach($fileContent as $content)
                                        <th> {{$content}} </th>
                                       @endforeach 
                                    </thead>
                                </table>
                            </div>        

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    {!! Form::label('product', 'Import Excent', ['class' => 'bmd-label-floating']) !!}
                                    <input type = "file" name = "excel_file" id = "excel_file">
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
    <script>

        $('input[id="product_checkbox"]'). click(function(){

            if($(this). prop("checked") == false){
                $("#product_sec").removeClass('hidden');
            }else{
                $("#product_sec").addClass('hidden');
            }
        });

        $('input[id="region_checkbox"]'). click(function(){

            if($(this). prop("checked") == false){
                $("#region_sec").removeClass('hidden');
            }else{
                $("#region_sec").addClass('hidden');
            }
        });

    </script>
@endsection

@push('angular')

@endpush