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
                            <h4 class="card-title">Edit Coupne</h4>
                            <p class="card-category">Update entry</p>
                        </div>

                        <div class="card-body">
                            {!! Form::open(array('route' => ['managment.coupen.update', $coupen->id], 'method' => 'PUT')) !!}

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('name', $coupen['name'], ['class' => 'form-control']) !!}
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('code', 'Enter Code', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('code', $coupen['code'], ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- radio buttom -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value = "1" id="customRadio1" name="type" class="custom-control-input" @if($coupen->getOriginal("type") == 1 ) checked @endif>
                                        <label class="custom-control-label" for="customRadio1">Discount In Percentage</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="type" value = "2" class="custom-control-input"  @if($coupen->getOriginal('type') == 2 ) checked @endif>
                                        <label class="custom-control-label" for="customRadio2">Discount In Amount</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('discount', 'Discount', ['class' => 'bmd-label-floating']) !!}
                                   {!! Form::text('discount',  $coupen['discount'], ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('enddate', 'End Date', ['class' => 'bmd-label-floating']) !!}
                                    {!! Form::text('enddate', $coupen['enddate'], ['class' => 'form-control datepicker']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label"> Coupen Applied for all Region
                                        <input class="form-check-input" id = "region_checkbox" name = "all_region" type="checkbox" value="1" @if( $coupen->getOriginal('all_region') == App\Models\Coupen::AllRegion) checked @endif>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                          
                            <div class="col-md-6 @if(  $coupen->getOriginal('all_region')== App\Models\Coupen::AllRegion) hidden @endif " id = "region_sec">
                                <div class="form-group">
                                    {!! Form::label('region', 'Select Region', ['class' => 'bmd-label-floating']) !!}
                                    <select name = "region[]" class="form-control select2" multiple>
                                        @foreach($regions as $key => $region)
                                            <option  @if(in_array($key , $coupen->region->pluck('id')->toArray())) 
                                            selected
                                            @endif
                                             value = "{{$key}}">{{$region}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label"> Coupen Applied for all Product
                                        <input class="form-check-input" name = "coupen_all" type="checkbox" id = "product_checkbox" value="1"  @if(  $coupen->getOriginal('all_product') == App\Models\Coupen::AllProduct) checked @endif>
                                        <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                                    </label>
                                </div>
                            </div>


 <div class="col-md-6 hidden" id = "region_sec">
                                <div class="form-group">
                                    {!! Form::label('region', 'Select Region', ['class' => 'bmd-label-floating']) !!}
                                    <select name = "region[]" class="form-control select2" multiple>
                                        @foreach($regions as $key => $region)
                                            <option value = "{{$key}}">{{$region}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                   
                        <div id = "product_sec" class="@if(   $coupen->getOriginal('all_product')== App\Models\Coupen::AllProduct) hidden @endif">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    {!! Form::label('product', 'Select Product', ['class' => 'bmd-label-floating']) !!}
                                    <select name = "product[]" class="form-control select2" multiple>
                                        <option> --Select All--</option>
                                        @foreach($products as $key => $product)
                                            <option @if(in_array($key , $coupen->product->pluck('id')->toArray())) selected @endif value = "{{$key}}">{{$product}}</option>
                                        @endforeach
                                    </select>
                                </div>
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