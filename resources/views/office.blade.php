@extends('layouts.main')
@section('main-section')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Office List</h4>
            </div>
            <div class="">


                <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </button>



            </div>
        </div>
        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>

                        <th>Name</th>
                        <th>Address</th>
                        <th>Remarks</th>


                        <th>Action</th>



                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $sno++ }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->remarks }}</td>
                            <td><button class="btn btn-primary btn-sm edit" type="button"
                                    data-data="{{ @json_encode($item) }}"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>

                            </td>



                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>



    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('SaveOffice') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> </span></h5>

                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id">


                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>

                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Address</label>
                            <textarea name="address" id="" class="form-control"></textarea>

                        </div>
                          <div class="col-md-12 mt-3">
                            <label for="">Remarks</label>
                            <textarea name="remarks" id="" class="form-control"></textarea>

                        </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).on("click", ".edit", function() {
            var data = $(this).data("data")
            $.each(data, function(i, o) {
                $("input[name=" + i + "]").val(o)
                $("select[name=" + i + "]").val(o)
                $("textarea[name=" + i + "]").val(o)
            })
            $("#modal_name").text("Update office");
            $("#exampleModal").modal("show");
        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add office");

            $("#id").val("");

            $("#exampleModal").modal("show");
        });

 
    </script>
@endsection
