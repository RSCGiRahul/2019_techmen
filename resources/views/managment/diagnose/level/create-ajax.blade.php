<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'bmd-label-floating']) !!}
            @if(count($selectOption) > 0)
            {!! Form::select('parent', $selectOption, NULL, ['class' => 'form-control select2','id' => 'parent', 'ng-model' => 'parent']) !!}
                @else
                {!! Form::text('name[]', old('name'), ['class' => ' form-control']) !!}
            @endif
        </div>
    </div>
    <div class="col-md-2 col-md-offset-2">
        <button type="button" class="btn-sm btn btn-primary add_more_level" >
            Add More
        </button>
    </div>
</div>