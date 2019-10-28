@extends('layouts.admin.layout')
@extends('layouts.admin.header')
@extends('layouts.admin.sidebar')
@extends('layouts.admin.navbar')
@extends('layouts.admin.footer')
@section('title', $title = 'Techman')

@section('content')
    <div class="content" ng-controller="gadget_list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.admin.alert')
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Brand Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">
                                <button type="button" class="pull-right btn btn-primary" onclick = "createForm()">Add Brand</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Gadget</th>
                                    <th>Edit</th>
                                    </thead>

                                    <tr ng-repeat="brand in brands">
                                        <td> <@ brand.id @> </td>
                                        <td> <@ brand.name @> </td>
                                        <td> <@ brand.gadget.name @> </td>
                                        <td>
                                            <a  id="<@ brand.id @>" class = "btn btn-sm btn-primary" href = "" onclick = "getBrandEdit(this.id)"> Edit</a>


                                            <a id = "<@ brand.id @>" href = "javascript:void(0)" onclick="removeBrand(this.id)" class="btn btn-sm btn-danger"> Delete</a>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('angular')
    <script>
        app.controller('gadget_list', function($scope){
            $scope.brands =  {!! json_encode($brands) !!};
            console.log($scope.brands);

            // $scope.remove =
        });
        function createForm()
        {
            $.get({
                url : "{{ route('managment.brand.create') }}",
                method : 'GET',
                type : 'HTML',
                success:function(response){
                    $("#modalData").html(response);
                    $("#model_title").text('Add Brand');
                    $("#myModal").modal();
                }

            })
        }
        function getBrandEdit(id)
        {
            $.get({
                url: 'brand/'+id+'/edit/',
                method : 'GET',
                type : 'HTML',
                success:function(response){
                    $("#modalData").html(response);
                    $("#model_title").text('Edit Brand');
                    $("#myModal").modal();
                }

            })
        }

        function removeBrand(item){
            // alert(item);
            var result = confirm("Are you sure delete this item?");
            if (result) {
                $.ajax({
                    url : 'brand/'+item,
                    method : 'DELETE',
                    data: { "_token": "{{ csrf_token() }}",},

                    success:function(msg){
                        console.log(msg);
                        location.reload();
                    }
                })
            }
        }
    </script>
@endpush