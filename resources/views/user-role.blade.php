@extends('layouts.main')
@section('main-section')
    @push('title')
        <title>Role</title>
    @endpush

    @php
        $edit = 0;
    @endphp
    @foreach ($rolePermissions as $item)
        @if ($item->permission_id == 2 && $item->edit == 1 && $item->view == 1)
            @php
                $edit = 1;
            @endphp
        @endif
    @endforeach
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Role</h4>
            </div>
            <div class="">
                @if ($edit == 1)
                    <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i> Add Role</button>
                @endif



            </div>
        </div>
        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th> Name</th>

                        @if ($edit == 1)
                            <th>Action</th>
                        @endif


                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    @foreach ($role as $item)
                        <tr>
                            <td>{{ $sno++ }}</td>

                            <td>{{ $item->name }}</td>


                            @if ($edit == 1)
                                <td><button class="btn btn-primary btn-sm edit" type="button" data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></button>

                                    <a class="btn btn-sm btn-info" href="/user-permission/{{ $item->id }}"><i
                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            @endif


                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>



    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('SaveRole') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> Add Role</span></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     
                        </button>
                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id">


                        <div class="col-md-12">
                            <label for="">Role</label>
                            <input type="text" name="name" id="name" class="form-control" required>

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
            $("#id").val($(this).data("id"));
            $("#name").val($(this).data("name"));
            $("#brand_id").val($(this).data("brand_id"));
            $("#modal_name").text("Update Role");
            $("#exampleModal").modal("show");
        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add Role");
            $("#id").val("");
            $("#exampleModal").modal("show");
        });
    </script>
@endsection
