
{{--{!! Form::open(array('route' => ('managment.gadget.store'), 'method' => 'Post')) !!}--}}

{{ Form::open(array('route' => ['managment.gadget.update', 'id' => $editGadget['id']] , 'method' => 'put') )}}
{{--{{ Form::open(array('route' => ['update-exam', 'id' => $id],'class' => 'form-horizontal', 'id'=>'basic_validate'))}}--}}

<!-- input number and text field -->

<div class="col-md-6">
    <div class="form-group">

        {!! Form::label('name', 'Enter Name', ['class' => 'bmd-label-floating']) !!}
        {!! Form::text('name' , $editGadget['name'] ,['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>


<button type="submit" class="btn btn-primary pull-right">Update</button>
<div class="clearfix"></div>
{!! Form::close() !!}
