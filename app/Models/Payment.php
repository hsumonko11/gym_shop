<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        "order_id",
        "amount",
        "payment_method",
        "status"
    ];

    public function order(){
        return $this->belongsTo(Order::class,'id','order_id');
    }
}
