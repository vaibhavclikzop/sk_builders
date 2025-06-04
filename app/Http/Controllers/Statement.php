<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\select;
use League\Csv\Reader;

class Statement extends Controller
{
    public function statement(Request $request, $status)
    {
        $data =   DB::table("statement")
            ->where("status", $status)
            ->get();
        $project =   DB::table("project")->get();
        $sub_account =   DB::table("sub_account")->get();
        return view("statement", compact("data", "project", "sub_account"));
    }


    public function ImportStatement(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt',
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with("error", $error);

                $count++;
            }
        }

        $count_d = 0;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv', 'public');

            $csv = Reader::createFromPath(storage_path('app/public/' . $filePath), 'r');
            // $csv->setHeaderOffset(0); // Assuming the first row contains headers
            $brand = "";
            $duplicate = 0;
            $error = "";
            $error_count = 0;
            $success = 0;
            $count = 1;

            foreach ($csv as $record) {

                try {
                    DB::table('statement')->insertGetId(array(
                        "date" => date("Y-m-d", strtotime($record[0])),
                        "details" => $record[1],
                        "ref_no" => $record[2],
                        "debit" => $record[3],
                        "credit" => $record[4],
                        "user_id" => $request->user->id,
                    ));
                    $success++;
                } catch (\Throwable $th) {
                    $error .= "Raw ID " . $count . " Invalid format. " . $th->getMessage() . "<br>";
                    $error_count++;
                }
                $count++;
            }

            return redirect()->back()->with("success", "Save successfully - Total : " . $count - 1 . " Success : " . $success . "  Duplicate : " . $duplicate . " Error : " . $error_count)->with("msg", $error);
        }

        return redirect()->back()->with("error", "No csv file selected for upload");
    }

    public function GetIds(Request $request)
    {

        if ($request->type == "customer") {
            $data = DB::table("customers")->get();
        } else if ($request->type == "vendor") {
            $data = DB::table("vendor")->get();
        } else if ($request->type == "office") {
            $data = DB::table("office")->get();
        }
        return $data;
    }

    public function updateStatement(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'type' => 'required',
            'cust_office_vendor_id' => 'required',
            'project_id' => 'required',
            'sub_account_id' => 'required',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->with("error", $validator->errors()->first());
        }

        try {


            DB::table("statement")->where("id", $request->id)->update(array(
                'type' => $request->type,
                'cust_office_vendor_id' => $request->cust_office_vendor_id,
                'project_id' => $request->project_id,
                'sub_account_id' => $request->sub_account_id,
                'status' => "complete",
            ));
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function customerReport(Request $request)
    {
        $customer =  DB::table("customers")->get();
        $customer_id = request("customer_id");
        $statement =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("customers as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("type", "customer");
        if ($customer_id) {
            $statement->where("a.cust_office_vendor_id", $customer_id);
        }
        $data = $statement->get();
        return view("customer-report", compact("data", "customer"));
    }

    public function vendorReport(Request $request)
    {
        $customer =  DB::table("vendor")->get();
        $customer_id = request("customer_id");
        $statement =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("vendor as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("type", "vendor");
        if ($customer_id) {
            $statement->where("a.cust_office_vendor_id", $customer_id);
        }
        $data = $statement->get();
        return view("vendor-report", compact("data", "customer"));
    }



    public function officeReport(Request $request)
    {
        $customer =  DB::table("office")->get();
        $customer_id = request("customer_id");
        $statement =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("office as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("type", "office");
        if ($customer_id) {
            $statement->where("a.cust_office_vendor_id", $customer_id);
        }
        $data = $statement->get();
        return view("vendor-report", compact("data", "customer"));
    }

    public function GetStatementDetails(Request $request)
    {
        $statement =  DB::table("statement")->where("id", $request->id)->first();

        if ($statement->type == "customer") {
            return  DB::table("statement as a")
                ->select("a.*", "b.name as customer")
                ->join("customers as b", "a.cust_office_vendor_id", "b.id")
                ->where("a.id", $request->id)->first();
        } else if ($request->type == "vendor") {
            return  DB::table("statement as a")
                ->select("a.*", "b.name as customer")
                ->join("vendor as b", "a.cust_office_vendor_id", "b.id")
                ->where("a.id", $request->id)->first();
        } else {
            return  DB::table("statement as a")
                ->select("a.*", "b.name as customer")
                ->join("office as b", "a.cust_office_vendor_id", "b.id")
                ->where("a.id", $request->id)->first();
        }
    }

    public function projectReport(Request $request)
    {
        $customer =  DB::table("project")->get();
        $project_id = request("customer_id");
        $customers =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("customers as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "customer");
        if ($project_id) {
            $customers->where("a.project_id", $project_id);
        }


        $vendor =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("vendor as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "vendor");
        if ($project_id) {
            $vendor->where("a.project_id", $project_id);
        }
        $office =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("office as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "office");
        if ($project_id) {
            $office->where("a.project_id", $project_id);
        }
        $data = $customers->union($vendor)->union($office)->get();

        // echo "<pre>";
        // print_r($data);
        // die;
        return view("project-report", compact("data", "customer"));
    }

    public function subAccountReport(Request $request)
    {
        $customer =  DB::table("sub_account")->get();
        $project_id = request("customer_id");
        $customers =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("customers as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "customer");
        if ($project_id) {
            $customers->where("a.sub_account_id", $project_id);
        }


        $vendor =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("vendor as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "vendor");
        if ($project_id) {
            $vendor->where("a.sub_account_id", $project_id);
        }


        $office =   DB::table("statement as a")
            ->select("a.*", "b.name as name", "c.name as project", "d.name as sub_account")
            ->join("office as b", "a.cust_office_vendor_id", "b.id")
            ->join("project as c", "a.project_id", "c.id")
            ->join("sub_account as d", "a.sub_account_id", "d.id")
            ->where("a.type", "office");
        if ($project_id) {
            $office->where("a.sub_account_id", $project_id);
        }
        $data = $customers->union($vendor)->union($office)->get();

        // echo "<pre>";
        // print_r($data);
        // die;
        return view("sub-account-report", compact("data", "customer"));
    }


    public function addCashEntry(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'type' => 'required',
            'cust_office_vendor_id' => 'required',
            'project_id' => 'required',
            'sub_account_id' => 'required',
            'date' => 'required',
            'ref_no' => 'required',
            'details' => 'required',
            'debit' => 'required',
            'credit' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }


        try {

            DB::table('statement')->insertGetId(array(
                'type' => $request->type,
                'cust_office_vendor_id' =>  $request->cust_office_vendor_id,
                'project_id' =>  $request->project_id,
                'sub_account_id' => $request->sub_account_id,
                'date' => $request->date,
                'ref_no' =>  $request->ref_no,
                'details' => $request->details,
                'debit' =>  $request->debit,
                'credit' => $request->credit,
                'user_id' => $request->user->id,
                'status' => "complete",


            ));
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }
}
