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

    <!-- Start Modal Edit Score -->
    <div class="modal hide fade" id="updateScoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                    <form action="{{route('update_score')}}" method="POST">
                        @csrf
                        <input type="hidden" id="score_id" name="score_id" value="">
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="card-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <h4 class="text-center card-title text-success">Edit Score</h4>

                                <div class="mb-2">
                                    <label for="e_title" class="form-label">Title</label>
                                    <input type="text" name="title" id="e_title" value="" class="form-control">
                                </div>

                                <div class="mb-2">
                                    <label for="e_description" class="form-label">Description</label>
                                    <input type="text" name="description" id="e_description" value="" class="form-control">
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
    <!-- End Modal Edit Score -->

    <!-- Start Modal Delete Score -->
    <div class="modal hide fade" id="deleteScoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="card shadow modal-body bg-dark rounded">
                    <form action="{{route('delete_score')}}" method="POST">
                        @method('delete')
                        @csrf
                        <div class="p-2 mb-1 bg-dark rounded">
                            <div class="card-body p-2">
                                <div class="modal-body">
                                    <p class="text-center">Are you sure you want to delete this?</p>
                                    <input type="hidden" id="scr_id" name="score_id" value="">

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
    <!-- End Modal Delete Score -->

    <!-- Start Main Content -->
    <form method="get" action="">
        <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
            <a href="" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="modal" data-bs-target="#createScoreModal" role="button" aria-expanded="true">
                <i class="fs-3 bi-file-earmark-plus" style="color:#35df91;"></i>
                <span class="ms-1 fs-3">Scores</span>
            </a>
        </div>
        <hr>

        <!-- Start Table -->
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
                    <th scope="row" class="id_score">{{$score->id}}</th>
                    <td class="title">{{$score->title}}</td>
                    <td class="description">{{$score->description}}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm scoresEdits" data-bs-toggle="modal" data-bs-target="#updateScoreModal">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm scoresDeletes" id="deleteScore" data-scrid="{{$score->id}}" data-bs-toggle="modal" data-bs-target="#deleteScoreModal">
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
    <div class="modal hide fade" id="createScoreModal" role="dialog" tabindex="-1" aria-labelledby="createScoreModalLabel" aria-hidden="true" style="display: none;">
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
            $(document).on('click', '.scoresEdits', function(){
                var _this = $(this).parents('tr');
                $('#score_id').val(_this.find('.id_score').text());
                $('#e_title').val(_this.find('.title').text());
                $('#e_description').val(_this.find('.description').text());
            });

        </script>

        <script>
            $('#deleteScoreModal').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget);

                var scr_id = button.data('scrid');
                var modal = $(this);

                modal.find('.modal-body #scr_id').val(scr_id);
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
