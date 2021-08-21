@extends('layout')

@section('title')
    Employees
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Start Modal Edit Employee -->
    <div class="modal hide fade" id="updateEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                    <form action="{{route('update_employee')}}" method="POST">
                        @csrf
                        <input type="hidden" id="employee_id" name="employee_id" value="">
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="card-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <h4 class="text-center card-title text-success">Edit Employee </h4>

                                <div class="mb-2">
                                    <label for="e_first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" id="e_first_name" value="" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="e_last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="e_last_name" value="" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="e_post" class="form-label">Post</label>
                                    <input type="text" name="post" id="e_post" value="" class="form-control">
                                </div>

                                <hr>

                                <div class="d-grid gap-2 col">
                                    <button type="submit" class="btn btn-outline-success btn-lg" name="btn_upd">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Employee -->

    <!-- Start Modal Delete Employee -->
    <div class="modal hide fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                <form action="{{route('delete_employee')}}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="p-2 mb-1 bg-dark rounded">
                        <div class="card-body p-2">
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this?</p>
{{--                    <input type="text" name="post" id="d_post" value="" class="form-control">--}}
                    <input type="hidden" id="empl_id" name="employee_id" value="">
                   <div id="mat-list">
                       <ol>
                           <li>

{{--                            @if(isset($_GET["employee_id"]))--}}
{{--                               <h1>aaaa</h1>--}}
{{--                               @endif--}}

                           </li>
                       </ol>
                   </div>
                </div>
                <div class="d-grid gap-2 col p-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-outline-danger" name="btn_del">Yes, Delete</button>
                </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Employee -->

    <!-- Start Main Content -->
    <form method="get" action="">
        <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
            <a href="" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="modal" data-bs-target="#createEmployeeModal" role="button" aria-expanded="true">
                <i class="fs-3 bi-person-plus" style="color:#35df91;"></i>
                <span class="ms-1 fs-3">Employees</span>
            </a>
        </div>
        <hr>

        <!-- Start Table -->
        <table id="datatable" class="table table-striped table-dark table-bordered display nowrap" style="width:100%">
            <thead>
            <tr>
                <th scope="row">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Post</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row" class="id_employee">{{$employee->id}}</th>
                    <td class="first_name">{{$employee->first_name}}</td>
                    <td class="last_name">{{$employee->last_name}}</td>
                    <td class="post">{{$employee->post}}</td>
                    <td class="created">{{$employee->created_at}}</td>
                    <td class="updated">{{$employee->updated_at}}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm employeesEdits" id="editEmployee" data-id="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#updateEmployeeModal" role="button" aria-expanded="true">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a class="btn btn-danger btn-sm employeesDeletes" href="" id="deleteEmployee" data-emplid="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal" role="button" aria-expanded="true">
{{--                           onclick="return confirm('Are you sure to want to delete it?')" data-original-title="Delete">--}}
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    <!-- End Main Content -->

    <!-- Start Modal Create -->
    <div class="modal hide fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                    <form action="{{action([\App\Http\Controllers\EmployeeController::class, 'create_web'])}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                        @csrf
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="modal-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <h4 class="text-center card-title text-success">New Employee</h4>

                                <div class="mb-2">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="post" class="form-label">Post</label>
                                    <select name="post" id="post" aria-label="Post list">
                                        <option value="">Select Post</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->post}}">{{$employee->post}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <div class="d-grid gap-2 col">
                                    <button type="submit" class="btn btn-outline-success btn-lg" name="btn_add">Create</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create -->


        <script>
            $(document).on('click', '.employeesEdits', function(){
                var _this = $(this).parents('tr');
                $('#employee_id').val(_this.find('.id_employee').text());
                $('#e_first_name').val(_this.find('.first_name').text());
                $('#e_last_name').val(_this.find('.last_name').text());
                $('#e_post').val(_this.find('.post').text());
            });

        </script>

    <script>
       $('#deleteEmployeeModal').on('show.bs.modal', function(event){
           var button = $(event.relatedTarget);

           var empl_id = button.data('emplid');
           var modal = $(this);

           modal.find('.modal-body #empl_id').val(empl_id);

           // document.getElementById('mat-list').innerHTML = empl_id;
           // $('#mat-list').html(empl_id);
       });
    </script>


        <script>
            $(document).ready(function () {
                $('select').selectize({
                    // sortField: 'text'
                }); }
            );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    "scrollX": true,
                    lengthMenu: [5, 10, 20, 50],
                    "order": [[ 5, "desc" ]],
                } );
            } );
        </script>

        <script>
            $(document).ready(function() {
                let table = $('#datatable').DataTable();

                $('#datatable tbody').on('dblclick', 'tr', function () {
                    let data = table.row(this).data();
                    alert( 'You clicked on '+data[0]+'\'s row' );
                } );
            } );
        </script>

@endsection
