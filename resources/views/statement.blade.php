@extends('layouts.main')
@section('main-section')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Import List</h4>
            </div>
            <div class="">



                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#import">
                    Import Statement
                </button>



            </div>
        </div>
        <div class="card-body">
            {!! session('msg') !!}
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Ref/Cheque ID</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp

                    @foreach ($data as $item)
                        @php
                            $fullText = $item->details;
                            $shortText = strlen($fullText) > 20 ? substr($fullText, 0, 20) . '...' : $fullText;
                        @endphp
                        <tr>
                            <td>{{ $sno++ }}</td>
                            <td>{{ $item->date }}</td>
                            <td title="{{ $fullText }}">
                                {{ $shortText }}
                            </td>
                            <td>{{ $item->ref_no }}</td>
                            <td>{{ $item->credit }}</td>
                            <td>{{ $item->debit }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <button class="btn btn-success btn-sm edit" data-id="{{ $item->id }}"
                                    data-data="{{ @json_encode($item) }}"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('updateStatement') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> </span></h5>
                        <button class="btn btn-primary" type="button" id="addCustomer">Add
                            Vendor/Customer</button>
                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id1">


                        <div class="col-md-12">
                            <label for="">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Select</option>
                                <option value="customer">customer</option>
                                <option value="vendor">vendor</option>
                                <option value="office">office</option>
                            </select>

                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="">Select</label>
                            <select name="cust_office_vendor_id" id="cust_office_vendor_id" class="form-control" required>
                                <option value="">Select</option>
                            </select>

                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="">Project</label>
                            <select name="project_id" id="project_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($project as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Sub Account</label>
                            <select name="sub_account_id" id="sub_account_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($sub_account as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
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






    <form action="{{ route('importStatement') }}" method="POST" class="needs-validation" novalidate
        enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="import" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Import Statement
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <a href="/import-statement.csv" download="/import-statement.csv"
                                    class="btn btn-primary btn-sm float-end">Download Sample</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




    <div class="modal fade" id="addCustVendor">
        <div class="modal-dialog modal-lg">

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
                    <button type="button" id="btnAddCustomer" class="btn btn-primary" id="">Save
                        changes</button>
                </div>
            </div>

        </div>
    </div>







    <script>
        $(document).on("click", ".edit", function() {

            let id = ($(this).data("id"))
            $.ajax({
                url: "/GetStatementDetails",
                type: "POST",
                data: {
                    id: $(this).data("id"),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {



                    $("#type").val(result.type)
                    $("#project_id").val(result.project_id)
                    $("#sub_account_id").val(result.sub_account_id)
                    $("#cust_office_vendor_id").html(
                        `<option value=${result.cust_office_vendor_id}>${result.customer}</option>`)


                    $("#id1").val(id)
                    $("#modal_name").text("Update ");
                    $("#exampleModal").modal("show");
                },
                error: function(result) {
                    console.log(result);
                }
            });



        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add");
            $("#id").val("");
            $("#exampleModal").modal("show");
        });


        $("#type").on("change", function() {
            $.ajax({
                url: "/GetIds",
                type: "POST",
                data: {
                    type: $(this).val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    var html = "";
                    html += '<option value="">----Select----</option>';
                    result.forEach(element => {

                        html += '<option value="' + element.id + '">' + element.name +
                            '</option>';
                    });
                    $("#cust_office_vendor_id").html(html)




                },
                error: function(result) {
                    console.log(result);
                }
            });

        })
        $(document).ready(function() {
            document.addEventListener("DOMContentLoaded", function() {
                $('#exampleModal').on('shown.bs.modal', function() {
                    $('#cust_office_vendor_id').select2({
                        dropdownParent: $('#exampleModal')
                    });
                });
            });
            $("#addCustomer").on("click", function() {
                $("#addCustVendor").modal("show")
            });

            $("#btnAddCustomer").on("click", function() {

            })
        })
    </script>
@endsection
