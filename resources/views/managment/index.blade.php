@extends('layouts.admin.layout')

@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Total Users</p>
                    <h3 class="card-title">20
                    <small>users</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons text-danger">users</i>
                    <a href="#pablo">Get More...</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Product</p>
                    <h3 class="card-title">42</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                    </div>
                    <p class="card-category">Fixed Issues</p>
                    <h3 class="card-title">7</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked data
                    </div>
                </div>
                </div>
            </div>

            </div>
            
            
        </div>
    </div>
    @endsection