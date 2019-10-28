
{!! Form::open(array('route' => ('managment.brand.store'), 'method' => 'Post')) !!}
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Select Brand', ['class' => 'bmd-label-floating']) !!}
            {!! Form::select('gadget_id', $gadgets, '1',['class' => 'form-control select2']) !!}

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
            {!! Form::text('name' , old('name'),['class' => 'form-control', 'id' => 'name']) !!}
        </div>
    </div>


    <button type="submit" class="btn btn-primary pull-right">Submit</button>
  <div class="clearfix"></div>
{!! Form::close() !!}
