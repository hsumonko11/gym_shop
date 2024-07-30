<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        "user_id",
        "order_id",
        "username",
        "email",
        "password",
        "phone",
        "address",
        "billing_address",
        "preferred_payment_method"
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
