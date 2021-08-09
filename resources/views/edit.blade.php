<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="card shadow modal-body bg-dark rounded">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$data["id"]}}">

                    <div class="p-2 mb-1 bg-dark rounded">
                        <div class="card-body p-2">

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <h4 class="text-center card-title text-success">Edit Material</h4>

                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" value="{{$data["title"]}}" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="row">
                                        <div class="col-4 col-sm-7">
                                            <label for="inventory_number" class="form-label">Inventory Number</label>
                                            <input type="text" name="inventory_number" id="inventory_number" value="{{$data["inventory_number"]}}" class="form-control">
                                        </div>
                                        <div class="col-4 col-sm-5">
                                            <label for="date_start" class="form-label">Date Start</label>
{{--                                                            <input type="text" name="date_start" id="date_start" class="form-control">--}}

                                        <!-- Date Picker Input -->
                                            <input type="text" class="form-control" name="date_start" id="date_start" value="{{$data["date_start"]}}"/>
                                            <!-- DEnd ate Picker Input -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="row">

                                        <div class="col-4 col-sm-5">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" name="price" id="price" value="{{$data["price"]}}" class="form-control">
                                        </div>

                                        <div class="col-4 col-sm-4">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" name="amount" id="amount" value="{{$data["amount"]}}" class="form-control">
                                        </div>

                                        <div class="col-4 col-sm-3">
                                            <label for="type" class="form-label">Type</label>
                                            <select name="type" id="type" aria-label="Type list" value="{{$data["type"]}}">
                                                <option>шт.</option>
                                                <option>компл.</option>
                                                <option>м.</option>
                                                <option>кг.</option>
                                                <option>мп.</option>
                                                <option>пар.</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mb-4">
                                    <div class="row">
                                        <div class="col-4 col-sm-7">
                                            <label for="employee_id" class="form-label">Employee</label>
{{--                                                            <input type="text" name="employee_id" id="employee_id" class="form-control">--}}

                                            <select name="employee_id" id="employee_id" value="{{$data["employee_id"]}}" aria-label="Employee list">
                                                <option value="">Select Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}"> {{$employee->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 col-sm-5">
                                            <label for="score_id" class="form-label">Score</label>
{{--                                                            <input type="text" name="score_id" id="score_id" class="form-control">--}}

                                            <select name="score_id" id="score_id" value="{{$data["score_id"]}}" aria-label="Employee list">
                                                <option value="">Select Score</option>
                                                @foreach($scores as $score)
                                                    <option value="{{$score->id}}">{{$score->title}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 col-12">
                                {{--                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                                <button type="submit" class="btn btn-outline-success btn-lg">Update</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
