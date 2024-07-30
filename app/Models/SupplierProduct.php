<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;

    protected $table = "supplier_products";

    protected $fillable = [
        "supplier_id",
        "product_id",
        "quantity",
        "original_price",
        "last_supplied_date",
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
