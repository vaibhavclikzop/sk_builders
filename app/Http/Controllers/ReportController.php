<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\StatementModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reports(Request $request)
    {
        $query = StatementModel::with(['project', 'sub_account']);


        // if ($request->filled('customer_id')) {
        //     $query->where('cust_office_vendor_id', $request->customer_id);
        // }




        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('cust_office_vendor_id')) {
            $query->where('cust_office_vendor_id', $request->cust_office_vendor_id);
        }

        if ($request->filled('project')) {
            $query->where('project_id', $request->project);
        }

        if ($request->filled('sub_account')) {
            $query->where('sub_account_id', $request->sub_account);
        }

        // Get filtered results
        $statements = $query->get();

        // Pass necessary data for form dropdowns
        $customer = Customer::get();
        $vendor = DB::table("vendor")->get();
        $project = DB::table("project")->get();
        $sub_account = DB::table('sub_account')->get();

        // Return view with filtered data
        return view('statement.statements', compact('statements', 'customer', 'vendor', 'project', 'sub_account'));
    }
}
