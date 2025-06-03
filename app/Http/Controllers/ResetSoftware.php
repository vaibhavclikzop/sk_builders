<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Raw;
use League\Csv\Reader;


class ResetSoftware extends Controller
{
    public function ResetSoftware(Request $request, $key)
    {

        $reset_key = DB::table("reset_key")->where("reset_key", $key)->first();
        if ($reset_key) {

            return view("reset-software", compact("reset_key"));
        } else {
            return redirect("/")->with("error", "Incorrect Reset Key");
        }
    }

    public function ResetSoft(Request $request)
    {
        $reset_key = DB::table("reset_key")->where("reset_key", $request->reset_key)->first();
        if ($reset_key) {

            DB::table("company_settings")->where("id", 1)->update(array(
                "company_name" => "Clikzop Innovations",
                "address" => "office no 38,  sushma infinium, Ambala chandigarh highway",
                "contact_person" => "Clikzop innovation",
                "number" => "9876543210",
                "email" => "clikzopinnovations@gmail.com",
                "gst_no" => "GSTIN321654987",
                "img" => "1722883763.jpg"
            ));
            DB::statement('TRUNCATE TABLE attendance');
            DB::statement('TRUNCATE TABLE channel_partner');
            DB::statement('TRUNCATE TABLE customers');
            DB::statement('TRUNCATE TABLE cp_inventory');
            DB::statement('TRUNCATE TABLE cp_inventory_det');
            DB::statement('TRUNCATE TABLE documents');
            DB::statement('TRUNCATE TABLE inventory');
            DB::statement('TRUNCATE TABLE kyc_documents');
            DB::statement('TRUNCATE TABLE plan_det');
            DB::statement('TRUNCATE TABLE plan_mst');
            DB::statement('TRUNCATE TABLE projects');
            DB::statement('TRUNCATE TABLE project_type');
            DB::statement('TRUNCATE TABLE role');
            DB::statement('TRUNCATE TABLE sale_documents');
            DB::statement('TRUNCATE TABLE sale_installment');
            DB::statement('TRUNCATE TABLE sale_installment_payment');
            DB::statement('TRUNCATE TABLE sale_kyc_files');
            DB::statement('TRUNCATE TABLE sale_mst');
            DB::statement('TRUNCATE TABLE uom');
            DB::statement('TRUNCATE TABLE users');
            DB::statement('TRUNCATE TABLE sale_refund');
         
            DB::table("role")->insertGetId(array(
                "name" => "admin",
                 
            ));
            DB::table("users")->insertGetId(array(
                "name" => "Clikzop Expertz",
                "address" => "office no 38, Sushma infinium ",
                "email" => "admin@gmail.com",
                "password" => "123456",
                "user_type" => "admin",
                "role_id" => 1,
            ));

            DB::table("reset_key")->where("id", 1)->update(array(
                "reset_key" => bin2hex(random_bytes(16)),

            ));

            echo "<h3>Your software reset successfully. </h3> <a href='/'>Home</a>";
        } else {
            return redirect("/")->with("error", "Incorrect Reset Key");
        }
    }
}
