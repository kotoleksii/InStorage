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

    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-8">--}}
    <form method="get" action="">
        <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
            <a href="" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="modal" data-bs-target="#createEmployeeModal" role="button" aria-expanded="true">
                <i class="fs-3 bi-person-plus" style="color:#35df91;"></i>
                <span class="ms-1 fs-3">Employees</span>
            </a>
        </div>

        <hr>

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
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->post}}</td>
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->updated_at}}</td>

                    <td>
                        <a href="employees/edit/{{$employee->id}}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateEmployeeModal" role="button" aria-expanded="true">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="employees/delete/{{$employee->id}}">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </form>


    <!-- Start Modal Create -->
    <div class="modal hide fade" id="createEmployeeModal" role="dialog" tabindex="-1" aria-labelledby="createEmployeeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                    <form action="{{action([\App\Http\Controllers\EmployeeController::class, 'create_web'])}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                        @csrf
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="card-body p-2">

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
        <!-- End Modal Create -->

        <!-- Start Modal Edit -->
        <div class="modal hide fade" id="updateEmployeeModal" role="dialog" tabindex="-1" aria-labelledby="updateEmployeeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="card shadow modal-body bg-dark rounded">
                        <form action="" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <div class="p-2 mb-1 bg-dark rounded">
                                <div class="card-body p-2">

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <h4 class="text-center card-title text-success">Edit Employee</h4>

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
                                        <button type="submit" class="btn btn-outline-success btn-lg" name="btn_add">Update</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit -->

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
                    // "order": [[ 0, "desc" ]],
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
