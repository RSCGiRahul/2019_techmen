
{!! Form::open(array('route' => ['managment.brand.update', $brands->id], 'method' => 'PUT')) !!}
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('name', 'Select Brand', ['class' => 'bmd-label-floating']) !!}
        {!! Form::select('gadget_id', $gadgets,  $brands->gadget_id,['class' => 'form-control']) !!}

    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
        {!! Form::text('name' , $brands->name,['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>


<button type="submit" class="btn btn-primary pull-right">Update</button>
<div class="clearfix"></div>
{!! Form::close() !!}
