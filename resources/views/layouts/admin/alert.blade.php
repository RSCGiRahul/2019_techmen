<!-- Success Alert -->
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong>  {{\Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

<!-- Error Alert -->
@if(\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Error!</strong>{{\Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissable flat">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif