<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'bmd-label-floating']) !!}
            {!! Form::text('name[]', old('name'), ['class' => ' form-control']) !!}
        </div>
    </div>
</div>