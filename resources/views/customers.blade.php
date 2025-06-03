@extends('layouts.main')
@section('main-section')
    @php
        $edit = 0;
    @endphp
    @foreach ($rolePermissions as $item)
        @if ($item->permission_id == 5 && $item->edit == 1 && $item->view == 1)
            @php
                $edit = 1;
            @endphp
        @endif
    @endforeach
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Customer List</h4>
            </div>
            <div class="">

                @if ($edit == 1)
                    <button type="button" class="btn btn-primary add"><i class="fa fa-plus"></i> Add Customer</button>
                @endif


            </div>
        </div>
        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>

                        <th>Name</th>
                        <th>Number</th>
                        <th>Total Debit</th>
                        <th>Total Credit</th>

                        <th>Active</th>
                        @if ($edit == 1)
                            <th>Action</th>
                        @endif


                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    @foreach ($customers as $item)
                        <tr>
                            <td>{{ $sno++ }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->debit }}</td>
                            <td>{{ $item->credit }}</td>


                            @if ($item->active == 1)
                                <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">InActive</span></td>
                            @endif

                            @if ($edit == 1)
                                <td><button class="btn btn-primary btn-sm edit" type="button" data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}" data-number="{{ $item->number }}"
                                        data-email="{{ $item->email }}" data-gst="{{ $item->gst }}"
                                        data-address="{{ $item->address }}" data-state="{{ $item->state }}"
                                        data-city="{{ $item->city }}" data-pincode="{{ $item->pincode }}"
                                        data-active="{{ $item->active }}" data-dob="{{ $item->dob }}"
                                        data-pan_card="{{ $item->pan_card }}" data-adhar_card="{{ $item->adhar_card }}"
                                        data-city1="{{ $item->city1 }}" data-so_wo="{{ $item->so_wo }}"
                                        data-rating="{{ $item->rating }}" data-project="{{ $item->project }}"
                                        data-unit_no="{{ $item->unit_no }}"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></button>

                                </td>
                            @endif


                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>



    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('SaveCustomer') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> Add customers</span></h5>
                        <button type="button" class="bs-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id">


                        <div class="col-md-6 mt-4">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>

                        </div>
                        <div class="col-md-6 mt-4 d-none">
                            <label for="">SO/WO</label>
                            <input type="text" name="so_wo" id="so_wo" class="form-control">
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
                        <div class="col-md-6 mt-4 d-none">
                            <label for="">Project</label>
                            <input type="" name="project" id="project" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4 d-none">
                            <label for="">Unit No</label>
                            <input type="" name="unit_no" id="unit_no" class="form-control">
                        </div>

                        <div class="col-md-6 mt-4 d-none">
                            <label for="">GST</label>
                            <input type="text" name="gst" id="gst" class="form-control">
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
                            <select name="city" id="city" class="form-control">
                                <option value="">---Select District---</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">City</label>
                            <input name="city1" id="city1" class="form-control">


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



                        <div class="col-md-6 mt-4 d-none">
                            <label for="">Rating</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="">---Select Rating---</option>
                                <option value="1 Star">1 Star</option>
                                <option value="3 Star">3 Star</option>
                                <option value="5 Star">5 Star</option>
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
            $("#id").val($(this).data("id"));
            $("#company_id").val($(this).data("company_id"));
            $("#name").val($(this).data("name"));
            $("#number").val($(this).data("number"));
            $("#email").val($(this).data("email"));
            $("#gst").val($(this).data("gst"));
            $("#address").val($(this).data("address"));
            $("#state").val($(this).data("state"));
            $("#city").html("<option value=" + $(this).data("city") + ">" + $(this).data("city") + "</option>");
            $("#pincode").val($(this).data("pincode"));
            $("#active").val($(this).data("active"));
            $("#dob").val($(this).data("dob"));
            $("#pan_card").val($(this).data("pan_card"));
            $("#adhar_card").val($(this).data("adhar_card"));
            $("#project").val($(this).data("project"));
            $("#unit_no").val($(this).data("unit_no"));
            $("#so_wo").val($(this).data("so_wo"));
            $("#city1").val($(this).data("city1"));
            $("#rating").val($(this).data("rating"));
            $("#modal_name").text("Update customers");

            if ($(this).data("source") == "Reference") {
                $(".reference").show();
            } else {
                $(".reference").hide();
            }
            $("#exampleModal").modal("show");
        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add customers");



            $("#id").val("");

            $("#exampleModal").modal("show");
        });
        $(".reference").hide();
        $("#source").on("change", function() {
            if ($(this).val() == "Reference") {
                $(".reference").show(500);
            } else {
                $(".reference").hide(500);
            }
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
