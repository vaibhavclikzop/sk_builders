<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\select;
use League\Csv\Reader;

class Masters extends Controller
{


    function generateRandomNumber($length = 12)
    {
        $number = '';
        while (strlen($number) < $length) {
            $number .= mt_rand(0, 9);
        }
        return substr($number, 0, $length);
    }

    public function GetCity(Request $request)
    {
        $state_city = DB::table("state_city")->distinct("state")->where("state", $request->state)->get();;
        return $state_city;
    }




    public function Customers(Request $request)
    {
        $customers = DB::table('customers as a')
            ->leftJoin(DB::raw('
        (SELECT cust_office_vendor_id, SUM(debit) as debit, SUM(credit) as credit 
         FROM statement 
         WHERE type = "customer" 
         GROUP BY cust_office_vendor_id) as b
    '), 'a.id', '=', 'b.cust_office_vendor_id')
            ->select('a.id', 'a.name', 'a.email', 'a.number',"a.active", "a.gst","a.address","a.state","a.city","a.pincode","a.dob","a.pan_card","a.adhar_card","a.city1","a.so_wo","a.rating","a.project","a.unit_no",DB::raw('COALESCE(b.debit, 0) as debit'), DB::raw('COALESCE(b.credit, 0) as credit'))
            ->get();



        return view("customers", compact('customers'));
    }


    public function SaveCustomer(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'number' => 'required|digits:10',
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);

                $count++;
            }
        }

        try {
            if (empty($request->id)) {
                DB::table('customers')->insertGetId(array(

                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    "gst" => $request->gst,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "active" => $request->active,
                    "dob" => $request->dob,
                    "pan_card" => $request->pan_card,
                    "adhar_card" => $request->adhar_card,
                    "so_wo" => $request->so_wo,
                    "city1" => $request->city1,
                    "rating" => $request->rating,
                    "project" => $request->project,
                    "unit_no" => $request->unit_no,

                ));
            } else {
                DB::table('customers')->where("id", $request->id)->update(array(

                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    "gst" => $request->gst,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "active" => $request->active,
                    "dob" => $request->dob,
                    "pan_card" => $request->pan_card,
                    "adhar_card" => $request->adhar_card,
                    "so_wo" => $request->so_wo,
                    "city1" => $request->city1,
                    "rating" => $request->rating,
                    "project" => $request->project,
                    "unit_no" => $request->unit_no,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function Settings(Request $request)
    {
        $settings = DB::table("company_settings")->where("id", 1)->first();



        return view("settings", compact("settings"));
    }

    public function SaveSettings(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = time() . '.' . $request->image->extension();

            $request->image->move('logo', $image);
        } else {
            $company_settings = DB::table("company_settings")->where("id", 1)->first();
            $image = $company_settings->img;
        }


        DB::table('company_settings')->where("id", 1)->update(array(
            "img" => $image,
            "img_width" => $request->img_width,
            "company_name" => $request->company_name,
            "address" => $request->address,
            "contact_person" => $request->contact_person,
            "number" => $request->number,
            "email" => $request->email,
            "gst_no" => $request->gst_no,
        ));

        return  redirect()->back()->with("success", "Save Successfully");
    }


    public function Users(Request $request)
    {


        $users = DB::table("users as a")
            ->select("a.*", "b.name as user_type")
            ->join("role as b", "a.role_id", "b.id")
            ->where("user_type", "!=", "admin")
            ->whereIn("a.id", $request->userIds)
            ->get();
        $parent_users = DB::table("users as a")
            ->select("a.*", "b.name as user_type")
            ->join("role as b", "a.role_id", "b.id")

            ->whereIn("a.id", $request->userIds)
            ->get();


        $role = DB::table("role")->where("name", "!=", "admin")->get();
        return view("users", compact("users", "role", "parent_users"));
    }
    public function SaveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);
                $count++;
            }
        }


        try {
            if (empty($request->id)) {
                DB::table('users')->insertGetId(array(
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "role_id" => $request->role_id,
                    "password" => $request->password,
                    "parent_id" => $request->parent_id,


                ));
            } else {
                DB::table('users')->where("id", $request->id)->update(array(
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "role_id" => $request->role_id,
                    "password" => $request->password,
                    "parent_id" => $request->parent_id,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function UserRole(Request $request)
    {
        $role = DB::table("role")->where("name", "!=", "admin")->get();
        // $role = DB::table("role")->get();
        return view("user-role", compact("role"));
    }

    public function SaveRole(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);

                $count++;
            }
        }

        try {
            if (empty($request->id)) {
                DB::table('role')->insertGetId(array(
                    "name" => $request->name,
                ));
            } else {
                DB::table('role')->where("id", $request->id)->update(array(
                    "name" => $request->name,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function UserPermission(Request $request, $id)
    {

        $role = DB::table("role")->where("id", $id)->first();


        $permission_mst = DB::table("permission_mst as a")
            ->select("a.*")
            ->whereNotExists(function ($query) use ($role) {
                $query->select(DB::raw(1))
                    ->from("role_permission as b")
                    ->whereColumn("b.permission_id", "a.id")
                    ->where("b.role_id", $role->id);
            })
            ->get();



        $role_permission = DB::table("role_permission as a")
            ->select("a.*", "b.name as permission")
            ->join("permission_mst as b", "a.permission_id", "b.id")
            ->where("a.role_id", $role->id)
            ->get();

        return view("user-permission", compact("role", "permission_mst", "role_permission", "id"));
    }

    public function SaveUserPermission(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permission_id' => 'required',
            'view' => 'required',
            'edit' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);

                $count++;
            }
        }

        $role_permission = DB::table("role_permission")->where("role_id", $request->role_id)->where("permission_id", $request->permission_id)->first();
        if ($role_permission) {
            return  redirect()->back()->with("error", "User permission already added");
        }
        try {
            if (empty($request->id)) {
                DB::table('role_permission')->insertGetId(array(
                    "role_id" => $request->role_id,
                    "permission_id" => $request->permission_id,
                    "edit" => $request->edit,
                    "view" => $request->view,
                ));
            } else {
                DB::table('role_permission')->where("id", $request->id)->update(array(

                    "edit" => $request->edit,
                    "view" => $request->view,
                ));
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function RemovePermission(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $count = 0;
            foreach ($messages->all() as $error) {
                if ($count == 0)
                    return redirect()->back()->with('error', $error);

                $count++;
            }
        }

        DB::table('role_permission')->where("id", $request->id)->delete();
        return  redirect()->back()->with("success", "Save Successfully");
    }



    public function GetUserDetails(Request $request)
    {
        $users = DB::table("users")->where("id", $request->id)->first();
        return $users;
    }



    public function vendor(Request $request)
    {
        $data = DB::table("vendor")->get();
        return view("vendor", compact('data'));
    }


    public function SaveVendor(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'number' => 'required|digits:10',
            'name' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {

            if ($request->id) {
                // Update
                DB::table('vendor')->where('id', $request->id)->update([
                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    "gst" => $request->gst,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "active" => $request->active,
                    "dob" => $request->dob,
                    "pan_card" => $request->pan_card,
                    "adhar_card" => $request->adhar_card,
                    "district" => $request->district,
                ]);
            } else {
                // Insert
                DB::table('vendor')->insert([
                    "name" => $request->name,
                    "number" => $request->number,
                    "email" => $request->email,
                    "gst" => $request->gst,
                    "address" => $request->address,
                    "state" => $request->state,
                    "city" => $request->city,
                    "pincode" => $request->pincode,
                    "active" => $request->active,
                    "dob" => $request->dob,
                    "pan_card" => $request->pan_card,
                    "adhar_card" => $request->adhar_card,
                    "district" => $request->district,
                ]);
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function office(Request $request)
    {
        $data = DB::table("office")->get();
        return view("office", compact('data'));
    }

    public function SaveOffice(Request $request)
    {

        $validator = Validator::make($request->all(), [


            'name' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {
            $data = [
                "name" => $request->name,
                "address" => $request->address,
                "remarks" => $request->remarks,
            ];

            if ($request->id) {

                DB::table('office')->where('id', $request->id)->update($data);
            } else {

                DB::table('office')->insert($data);
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function project()
    {
        $data = DB::table("project")->get();
        return view("project", compact('data'));
    }


    public function SaveProject(Request $request)
    {

        $validator = Validator::make($request->all(), [


            'name' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {
            $data = [
                "name" => $request->name,

            ];

            if ($request->id) {

                DB::table('project')->where('id', $request->id)->update($data);
            } else {

                DB::table('project')->insert($data);
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

    public function subAccount()
    {
        $data = DB::table("sub_account")->get();
        return view("sub-account", compact('data'));
    }
    public function SaveSubAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {
            $data = [
                "name" => $request->name,

            ];

            if ($request->id) {

                DB::table('sub_account')->where('id', $request->id)->update($data);
            } else {

                DB::table('sub_account')->insert($data);
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

        return  redirect()->back()->with("success", "Save Successfully");
    }

   public function addCustomerVendor(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'   => 'required',
        'number' => 'required|digits:10',
        'email'  => 'required|email',
        'type'   => 'required|in:customer,vendor',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    if ($request->type == "customer") {
        DB::table('customers')->insert([
            "name"      => $request->name,
            "number"    => $request->number,
            "email"     => $request->email,
            "gst"       => $request->gst,
            "address"   => $request->address,
            "state"     => $request->state,
            "city"      => $request->city,
            "pincode"   => $request->pincode,
            "active"    => $request->active,
            "dob"       => $request->dob,
            "pan_card"  => $request->pan_card,
            "adhar_card"=> $request->adhar_card,
            "so_wo"     => $request->so_wo,
            "city1"     => $request->city1,
            "rating"    => $request->rating,
            "project"   => $request->project,
            "unit_no"   => $request->unit_no,
        ]);

        return redirect()->back()->with('success', 'Customer added successfully!');
    } 
    else {
        DB::table('vendor')->insert([
            "name"       => $request->name,
            "number"     => $request->number,
            "email"      => $request->email,
            "gst"        => $request->gst,
            "address"    => $request->address,
            "state"      => $request->state,
            "city"       => $request->city,
            "pincode"    => $request->pincode,
            "active"     => $request->active,
            "dob"        => $request->dob,
            "pan_card"   => $request->pan_card,
            "adhar_card" => $request->adhar_card,
            "district"   => $request->district,
        ]);

        return redirect()->back()->with('success', 'Vendor added successfully!');
    }
}

}
