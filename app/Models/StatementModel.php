<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatementModel extends Model
{
    use HasFactory;
    protected $table = "statement";
    protected $fillable = [
        "type",
        "cust_office_vendor_id",
        "project_id",
        "sub_account_id",
        "date",
        "details",
        "ref_no",
        "debit",
        "credit",
        "user_id",
        "status",
    ];

    public function project(){
        return  $this->belongsTo(Project::class,"project_id");
    }
    public function sub_account(){
        return $this->belongsTo(SubAccount::class,"sub_account_id");
    }
public function getCustomerOrVendorAttribute()
{
    if ($this->type == 'customer') {
        return Customer::find($this->cust_office_vendor_id);
    } elseif ($this->type == 'vendor') {
        return vendorModel::find($this->cust_office_vendor_id);
    }
    return null;
}


}
