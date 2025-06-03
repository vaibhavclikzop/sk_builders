@extends('layouts.main')
@section('main-section')
    @push('title')
        <title>Dashboard</title>
    @endpush


    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Admin Dashboard</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Dashboard
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                </ol>
            </nav>

        </div>
        <div class="float-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cashEntry">
                Add Cash Entry
            </button>
        </div>

    </div>
    <!-- /Breadcrumb -->


    <div class="row">

        <!-- Widget Info -->
        <div class="col-xxl-12 d-flex">
            <div class="row flex-fill">
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-primary mb-2">
                                <i class="ti ti-calendar-share fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Total Statement</h6>
                            <h3 class="mb-3">{{ $statement->total }} </h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-secondary mb-2">
                                <i class="ti ti-browser fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Pending Statement</h6>
                            <h3 class="mb-3">{{ $statement->pending }} </h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-info mb-2">
                                <i class="ti ti-users-group fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Complete Statement</h6>
                            <h3 class="mb-3">{{ $statement->complete }}</h3>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-purple mb-2">
                            <i class="ti ti-moneybag fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Customers</h6>
                        <h3 class="mb-3">{{ $customers }}</h3>
                        <a href="/customers" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-danger mb-2">
                            <i class="ti ti-browser fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Vendor</h6>
                        <h3 class="mb-3">{{ $vendor }}</h3>
                        <a href="/vendor" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-success mb-2">
                            <i class="ti ti-users-group fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Office</h6>
                        <h3 class="mb-3">{{ $office }} </h3>
                        <a href="/office" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-dark mb-2">
                            <i class="ti ti-user-star fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Project</h6>
                        <h3 class="mb-3">{{ $project }} </h3>
                        <a href="/project" class="link-default">View All</a>
                    </div>
                </div>
            </div>
        </div>


    </div>





    <form action="{{ route('addCashEntry') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="cashEntry" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Cash Entry
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body row">



                            <div class="col-md-6">
                                <label for="">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="customer">customer</option>
                                    <option value="vendor">vendor</option>
                                    <option value="office">office</option>
                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="">Select</label>
                                <select name="cust_office_vendor_id" id="cust_office_vendor_id" class="form-control"
                                    required>
                                    <option value="">Select</option>
                                </select>

                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Project</label>
                                <select name="project_id" id="project_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($projects as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Sub Account</label>
                                <select name="sub_account_id" id="sub_account_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($sub_account as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Ref/Cheque ID</label>
                                <input type="text" name="ref_no" class="form-control" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="">Details</label>
                                <textarea name="details" id="" class="form-control" required></textarea>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Debit</label>
                                <input type="number" step="0.01" name="debit" class="form-control" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Credit</label>
                                <input type="number" step="0.01" name="credit" class="form-control" required>
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

    <script>
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
    </script>
@endsection
