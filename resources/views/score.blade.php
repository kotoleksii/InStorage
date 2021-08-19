@extends('layout')

@section('title')
    Scores
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

    <button type="button" class="btn btn-success btn-sm" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#modal1">modal1</button>

    <button type="button" class="btn btn-success btn-sm" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#modal2">modal2</button>

    <button type="button" class="btn btn-success btn-sm" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#modal3">modal3</button>

    <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Modal1
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal hide fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Modal2
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal hide fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Modal3
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <form method="get" action="">
        <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
            <a href="" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="modal" data-bs-target="#createEmployeeModal" role="button" aria-expanded="true">
                <i class="fs-3 bi-file-earmark-plus" style="color:#35df91;"></i>
                <span class="ms-1 fs-3">Scores</span>
            </a>
        </div>

        <hr>

        <table id="datatable" class="table table-striped table-dark table-bordered display nowrap" style="width:100%">
            <thead>
            <tr>
                <th scope="row">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($scores as $score)
                <tr>
                    <th scope="row">{{$score->id}}</th>
                    <td>{{$score->title}}</td>
                    <td>{{$score->description}}</td>
                    <td>
                        <a href="scores/edit/{{$score->id}}" class="btn btn-warning btn-sm" role="button" aria-expanded="true">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="scores/delete/{{$score->id}}">
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
                    <form action="{{action([\App\Http\Controllers\ScoreController::class, 'create_web'])}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                        @csrf
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="card-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <h4 class="text-center card-title text-success">New Score</h4>

                                <div class="mb-2">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" id="description" class="form-control">
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
                        "order": [[ 0, "desc" ]],
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
