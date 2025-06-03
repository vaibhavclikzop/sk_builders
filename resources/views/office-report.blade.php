@extends('layouts.main')
@section('main-section')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="page-title">
                <h4>Vendor Office</h4>
            </div>
            <div class="">


                <form action="">
                    <label for="">Select Office</label>

                    <select name="customer_id" id="" class="form-control" onchange="this.form.submit()">
                        <option value="">Select</option>
                        @foreach ($customer as $item)
                            <option value="{{ $item->id }}" {{ request('customer_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>

                </form>

            </div>
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


                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                        $total_debit = 0;
                        $total_credit = 0;
                    @endphp
                    @foreach ($data as $item)
                        @php
                            $total_debit += $item->debit;
                            $total_credit += $item->credit;
                            $fullText = $item->details;
                            $shortText = strlen($fullText) > 20 ? substr($fullText, 0, 20) . '...' : $fullText;
                        @endphp
                        <tr>
                            <td>{{ $sno++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->project }}</td>
                            <td>{{ $item->sub_account }}</td>
                            <td>{{ $item->date }}</td>
                            <td title="{{ $fullText }}">
                                {{ $shortText }}
                            </td>
                            <td>{{ $item->ref_no }}</td>
                            <td>{{ $item->debit }}</td>
                            <td>{{ $item->credit }}</td>

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
@endsection
