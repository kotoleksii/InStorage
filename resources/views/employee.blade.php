@extends('layout')

@section('title')
    | Employees
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                    <form action="{{route('update_employee')}}" method="POST">
                        @csrf
                        <input type="hidden" id="employee_id" name="employee_id" value="">
                        <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                            <div class="card-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <p class="text-center fs-3 card-title" style="color: #a2bdd8">Edit Employee </p>

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

                                <div class="d-grid gap-2 col mt-4">
                                    <button type="submit" class="btn btn-lg shadow text-white" style="background-color: #276899;" name="btn_upd">Update</button>
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
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                <form action="{{route('delete_employee')}}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                        <div class="card-body p-2">
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this?</p>
                    <input type="hidden" id="empl_id" name="employee_id" value="">
                    <ul class="employees_length ps-2" style="width: auto; height: 100px; overflow-x: hidden; overflow-y: scroll;"></ul>
                </div>
                <div class="d-grid gap-2 col p-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-danger shadow-sm" name="btn_del" id="btn_del" disabled>Yes, Delete</button>
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
                <i class="fs-4 bi-plus-circle" style="color:#508fcd;"></i>
                <span class="ms-1 fs-3">Employees</span>
            </a>
        </div>
        <hr>

        <!-- Start Spinner -->
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"></div>
        </div>
        <!-- End Spinner -->

        <!-- Start Table -->
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap" style="width: 100%;">
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
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->
    </form>
    <!-- End Main Content -->

    <!-- Start Modal Create -->
    <div class="modal hide fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                    <form action="{{route('create_employee')}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                        @csrf
                        <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                            <div class="modal-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <p class="text-center fs-3 card-title" style="color: #a2bdd8">New Employee</p>

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

                                <div class="d-grid gap-2 col mt-4">
                                    <button type="submit" class="btn btn-lg shadow text-white" style="background-color: #276899;" name="btn_add">Create</button>
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
            let _this = $(this).parents('tr');
            $('#employee_id').val(_this.find('.id_employee').text());
            $('#e_first_name').val(_this.find('.first_name').text());
            $('#e_last_name').val(_this.find('.last_name').text());
            $('#e_post').val(_this.find('.post').text());
        });
    </script>

    <script>
        $('#deleteEmployeeModal').on('show.bs.modal', async function (event) {
            let button = $(event.relatedTarget);

            let empl_id = button.data('emplid');
            let modal = $(this);

            modal.find('.modal-body #empl_id').val(empl_id);

            await renderEmployees(empl_id);
        });
        async function getMaterials(url) {
            try {
                let res = await fetch(url);
                return await res.json()
            } catch (error) {
                console.log(error);
            }
        }
        async function renderEmployees(empl_id) {
            let url = `api/materials/`;
            let employees = await getMaterials(url);
            let employeesFiltered = employees.filter(value => value.employee_id === empl_id);
            let employeesFilteredLength = employeesFiltered.length;
            let html = '';

            btnDelBehavior(employeesFilteredLength);

            employeesFiltered
                .forEach(material => {
                    let htmlSegment =
                        `<div class="employee">
                            <li style="list-style-type: none;">${material.id} - ${material.title} (${material.inventory_number})</li>
                        </div>`;

                    html += htmlSegment;
                });

            let htmlEmployeeListHeader = `<div class="employee_list_header">У цього робітника на рахунках матеріалів - ${employeesFilteredLength}</div>`
            let infoMessage = '';
            if(employeesFilteredLength > 0)
                infoMessage = `<div class="employee_list_message text-danger">Видалення неможливе, перенесіть матеріали</div>`
            else
                infoMessage = `<div class="employee_list_message text-success">Видалення можливе, якщо впевнені - тисніть YES</div>`

            let container = document.querySelector('.employees_length');
            container.innerHTML = htmlEmployeeListHeader + infoMessage + html;
        }

        function btnDelBehavior(employeesFilteredLength)
        {
            const text = document.getElementById("btn_del");

            switch (employeesFilteredLength) {
                case 0:
                    text.removeAttribute("disabled", "");
                    text.setAttribute("enabled", "");
                    break;
                default:
                    text.removeAttribute("enabled", "");
                    text.setAttribute("disabled", "");
                    break;
            }
        }
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
                // "iDisplayLength": -1,
                "bPaginate": true,
                "iCookieDuration": 60,
                "bStateSave": false,
                "bAutoWidth": false,
                //true
                "bScrollAutoCss": true,
                "bProcessing": true,
                "bRetrieve": true,
                "bJQueryUI": true,
                //"sDom": 't',
                "sDom": '<"H"CTrf>t<"F"lip>',
                lengthMenu: [5, 10, 20, 50],
                // "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                //"sScrollY": "500px",
                // "sScrollX": "100%",
                // "sScrollXInner": "110%",
                "fnInitComplete": function() {
                    this.css("visibility", "visible");
                },

                "order": [[ 5, "desc" ]],
                // responsive: true,
                // "scrollX": true,
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
