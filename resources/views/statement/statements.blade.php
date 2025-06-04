@extends('layouts.main')
@section('main-section')
    <div class="card">
        <div class="card-header">
            <form action="" method="GET">
                <div class="row align-items-end">
                    {{-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">Select Customer</option>
                                @foreach ($customer as $row)
                                    <option value="{{ $row->id }}"
                                        {{ request('customer_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <input type="hidden" name="cust_office_vendor_name" id="cust_office_vendor_name"
                        value="{{ request('cust_office_vendor_name') }}">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="type">Types</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="customer" {{ request('type') == 'customer' ? 'selected' : '' }}>Customer
                                </option>
                                <option value="vendor" {{ request('type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cust_office_vendor_id">Customer|Vendor</label>
                            <select name="cust_office_vendor_id" id="cust_office_vendor_id" class="form-control">
                                <option value="">Select</option>
                                @if (request('cust_office_vendor_id'))
                                    <option value="{{ request('cust_office_vendor_id') }}" selected>
                                        {{ request('cust_office_vendor_name') }} </option>
                                @endif


                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="project">Projects</label>
                            <select name="project" id="project" class="form-control">
                                <option value="">Select Project</option>
                                @foreach ($project as $row)
                                    <option value="{{ $row->id }}"
                                        {{ request('project') == $row->id ? 'selected' : '' }}>
                                        {{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sub_account">Sub Accounts</label>
                            <select name="sub_account" id="sub_account" class="form-control">
                                <option value="">Select Sub Accounts</option>
                                @foreach ($sub_account as $row)
                                    <option value="{{ $row->id }}"
                                        {{ request('sub_account') == $row->id ? 'selected' : '' }}>
                                        {{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>

                </div>
            </form>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#cashEntry">
                Add Cash Entry
            </button>

        </div>

        <div class="card-body">
            {!! session('msg') !!}
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Sub Account</th>
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
                        $total_debit = 0;
                        $total_credit = 0;

                    @endphp
                    @foreach ($statements as $row)
                        @php
                            $total_debit += $row->debit;
                            $total_credit += $row->credit;
                            $fullText = $row->details;
                            $shortText = strlen($fullText) > 20 ? substr($fullText, 0, 20) . '...' : $fullText;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->customer?->name }}</td>
                            <td>{{ $row->project?->name }}</td>
                            <td>{{ $row->getCustomerOrVendorAttribute()?->name ?? '-' }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $shortText }}</td>
                            <td>{{ $row->ref_no }}</td>
                            <td>{{ $row->debit }}</td>
                            <td>{{ $row->credit }}</td>
                            <td>{{ $row->status }}</td>
                            <td></td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">Total</td>
                        <td>{{ $total_debit }}</td>
                        <td>{{ $total_credit }}</td>


                    </tr>
                </tfoot>


            </table>
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
                                <select name="type" id="" class="form-control type" required>
                                    <option value="">Select</option>
                                    <option value="customer" {{ request('type') == 'customer' ? 'selected' : '' }}>Customer
                                    </option>
                                    <option value="vendor" {{ request('type') == 'vendor' ? 'selected' : '' }}>Vendor
                                    </option>
                                    <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office
                                    </option>
                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="">Select</label>
                                <select name="cust_office_vendor_id" id="cust_vendor" class="form-control" required>
                                    <option value="">Select</option>
                                    @if (request('cust_office_vendor_id'))
                                        <option value="{{ request('cust_office_vendor_id') }}" selected>
                                            {{ request('cust_office_vendor_name') }} </option>
                                    @endif
                                </select>

                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Project</label>
                                <select name="project_id" id="project_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($project as $row)
                                        <option value="{{ $row->id }}"
                                            {{ request('project') == $row->id ? 'selected' : '' }}>
                                            {{ $row->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Sub Account</label>
                                <select name="sub_account_id" id="sub_account_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($sub_account as $row)
                                        <option value="{{ $row->id }}"
                                            {{ request('sub_account') == $row->id ? 'selected' : '' }}>
                                            {{ $row->name }}
                                        </option>
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
        $("#type").on("change click", function() {
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

                        html += '<option value="' + element.id + '" data-name="' + element
                            .name + '">' + element.name +
                            '</option>';
                    });
                    $("#cust_office_vendor_id").html(html)




                },
                error: function(result) {
                    console.log(result);
                }
            });

        });
        $("#cust_office_vendor_id").on("change", function() {
            var selectedName = $(this).find('option:selected').data('name');

            $("#cust_office_vendor_name").val(selectedName)
        });
    </script>
@endsection
