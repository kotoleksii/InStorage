@extends('layout')

@section('title')
    | Scores
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
                                    <ul class="scores_length ps-2" style="width: auto; height: 100px; overflow-x: hidden; overflow-y: scroll;"></ul>
                                </div>
                                <div class="d-grid gap-2 col p-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                    <button type="submit" class="btn btn-outline-danger" name="btn_del" id="btn_del" disabled>Yes, Delete</button>
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
            <a href="" class="text-center nav-link text-white rounded" data-bs-toggle="modal" data-bs-target="#createScoreModal" role="button" aria-expanded="true">
                <i class="fs-4 bi-plus-circle" style="color:#3fa7cf;"></i>
                <span class="ms-1 fs-3">Scores</span>
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
            <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap" style="width:100%">
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
        </div>
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
                let _this = $(this).parents('tr');
                $('#score_id').val(_this.find('.id_score').text());
                $('#e_title').val(_this.find('.title').text());
                $('#e_description').val(_this.find('.description').text());
            });

        </script>

        <script>
            $('#deleteScoreModal').on('show.bs.modal', async function (event) {
                let button = $(event.relatedTarget);

                let scr_id = button.data('scrid');
                let modal = $(this);

                // modal.find('.modal-body #scr_id').val(scr_id);

                await renderScores(scr_id);
            });
            async function getScores(url) {
                try {
                    let res = await fetch(url);
                    return await res.json()
                } catch (error) {
                    console.log(error);
                }
            }
            async function renderScores(scr_id) {
                let url = `api/materials/`;
                let scores = await getScores(url);
                let scoresFiltered = scores.filter(value => value.score_id === scr_id);
                let scoresFilteredLength = scoresFiltered.length;
                let html = '';

                btnDelBehavior(scoresFilteredLength);

                scoresFiltered
                    .forEach(score => {
                    let htmlSegment =
                        `<div class="score">
                            <li style="list-style-type: none;">${score.id} - ${score.title}</li>
                        </div>`;

                    html += htmlSegment;
                });

                let htmlScoreListHeader = `<div class="score_list_header">На цьому рахунку матеріалів - ${scoresFiltered.length}</div>`
                let infoMessage = '';
                if(scoresFilteredLength > 0)
                    infoMessage = `<div class="score_list_message text-danger">Видалення неможливе, перенесіть матеріали</div>`

                let container = document.querySelector('.scores_length');
                container.innerHTML = infoMessage + htmlScoreListHeader + html;
            }

            function btnDelBehavior(scoresFilteredLength)
            {
                const text = document.getElementById("btn_del");

                switch (scoresFilteredLength) {
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
                        // "scrollX": true,
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
