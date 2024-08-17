<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        "customer_id",
        "voucher_no",
        "total_amount",
        "status",
        "payment_status",
        "payment_screenshot"
    ];

    public function user(){
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','user_id');
    }
}
