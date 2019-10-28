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
                            <h4 class="card-title">Gadget Table</h4>

                            <p class="card-category"> </p>

                        </div>
                        <div class="card-body">
                            <div class = "pull-right">




                            </div>
                            <div class="table-responsive">
                                <button type="button" class="btn btn-primary" onclick = "createForm()">Add Gadget</button>
                                <table class="table " id="myTable">

                                    <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                    </thead>

                                    <tr ng-repeat="gadget in gadgets">
                                        <td> <@ gadget.id @> </td>
                                        <td> <@ gadget.name @> </td>
                                        <td> <a  id="<@ gadget.id @>" class = "btn btn-sm btn-primary" href = "" onclick = "getGadgetEdit(this.id)"> Edit</a>
                                     
                                            <a class = "btn btn-sm btn-danger"  id="<@ gadget.id @>"  href = "" onclick = "getGadgetDelete(this.id)"> Delete</a>
                                       
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
            $scope.gadgets =  {!! json_encode($allGadget) !!};
            console.log($scope.gadgets);
        });
        function createForm()
        {
            $.get({
                url : "{{ route('managment.gadget.create') }}",
                method : 'GET',
                type : 'HTML',
                success:function(response){
                    $("#modalData").html(response);
                    $("#model_title").text('Add Gadget');
                    $("#myModal").modal();
                }

            })
        }
        function getGadgetEdit(id)
        {
            $.get({
                url: 'gadget/'+id+'/edit/',
                method : 'GET',
                type : 'HTML',
                success:function(response){
                    $("#modalData").html(response);
                    $("#model_title").text('Add Gadget');
                    $("#myModal").modal();
                }

            })
        }

        function getGadgetDelete(id)
        {
            $.get({
                url: 'gadget/destroy/'+id,
                method : 'POST',
                type : 'HTML',
                data : {'_token' : '{{csrf_token()}}' },
                success:function(response){
                   location.reload();
                    // $("#modalData").html(response);
                    // $("#model_title").text('Add Gadget');
                    // $("#myModal").modal();
                }

            })
        }
    </script>
@endpush