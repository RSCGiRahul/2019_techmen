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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="myTable">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>XYZ</th>
                        <th>XYZ</th>
                        <th>XYZ</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>asd</td>
                          <td>syz</td>
                          <td>syz</td>
                          <td>syz</td>
                          <td>syz</td>
                        </tr>
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                        </tr>
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr>
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr>
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr>                         
                        <tr>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                            <td>syz</td>
                          <td class="text-primary">xyz</td>
                        </tr> 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection