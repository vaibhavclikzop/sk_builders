@extends('layouts.main')
@section('main-section')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Vendor List</h4>
            </div>
            <div class="">


                <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i> Add Vendor</button>



            </div>
        </div>
        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>

                        <th>Name</th>
                        <th>Number</th>

                        <th>Email</th>

                        <th>Address</th>

                        <th>City</th>
                        <th>District</th>
                        <th>State</th>
                        <th>Pincode</th>

                        <th>Active</th>

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
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->email }}</td>

                            <td>{{ $item->address }}</td>
                            <td>{{ $item->district }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->state }}</td>
                            <td>{{ $item->pincode }}</td>

                            @if ($item->active == 1)
                                <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">InActive</span></td>
                            @endif


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
        <div class="modal-dialog modal-lg">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('SaveVendor') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> </span></h5>

                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id">


                        <div class="col-md-6 mt-4">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>

                        </div>


                        <div class="col-md-6 mt-4">
                            <label for="">Number</label>
                            <input type="number" name="number" id="number" class="form-control" required>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">DOB</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Pan Card</label>
                            <input type="" name="pan_card" id="pan_card" class="form-control">
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Adhar Card</label>
                            <input type="" name="adhar_card" id="adhar_card" class="form-control">
                        </div>


                        <div class="col-md-12 mt-4">
                            <label for="">Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>


                        <div class="col-md-6 mt-4">
                            <label for="">State</label>
                            <select name="state" id="state" class="form-control">
                                <option value="">---Select State---</option>
                                @foreach ($state as $item)
                                    <option value="{{ $item->state }}">{{ $item->state }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">District</label>
                            <select name="district" id="city" class="form-control">
                                <option value="">---Select District---</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">City</label>
                            <input name="city" class="form-control">


                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Pincode</label>
                            <input type="number" name="pincode" id="pincode" class="form-control">
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Active</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
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
            $("#modal_name").text("Update Vendor");
            $("#exampleModal").modal("show");
        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add Vendor");



            $("#id").val("");

            $("#exampleModal").modal("show");
        });




        $("#state").on("change", function() {
            $.ajax({
                url: "/GetCity",
                type: "POST",
                data: {
                    state: $(this).val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    var html = "";
                    html += '<option value="">----Select City----</option>';
                    result.forEach(element => {

                        html += '<option value="' + element.city + '">' + element.city +
                            '</option>';
                    });
                    $("#city").html(html)
                },
                error: function(result) {
                    console.log(result);
                }
            });

        })
    </script>
@endsection
