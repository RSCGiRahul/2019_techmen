@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
<style>
.showfile{
    opacity : 10 !important;
    z-index:100 !important;
}
</style>    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Upload File</h4>
                            <p class="card-category">Add new entry</p>
                        </div>

                        <div class="card-body">
                            {!! Form::open(array('route' => ('managment.admin.uploadcsv'), 'method' => 'Post','enctype'=>'multipart/form-data')) !!}
                             @php $fileContent = array('Brand','Model Name', 'Fault', 'Price', 'Offer Price(our price) ', 'Remark'); @endphp       
                            <div class="table-responsive">
                                <table class="table " >
                                    <thead class=" text-primary">
                                        @foreach($fileContent as $content)
                                        <th> {{$content}} </th>
                                       @endforeach 
                                    </thead>
                                </table>
                            </div>        

                            <div class="col-md-6 ">
                                <div class="form-group">
                                <label for="">drag and drop your file</label>                             
                                <input type="file" name = "excel_file" class="dropify showfile" data-max-file-size-preview="3M" />
                          
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
    </script>
@endsection
