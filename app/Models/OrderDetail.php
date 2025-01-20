<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";
    protected $timestamp = false;
    public $fillable = ["id", "order_fk", "product_fk", "num_adult", "price_adult", "num_child", "price_child"];

    public function order(){
        return $this->belongsTo('App\Models\Order', 'order_fk');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_fk');
    }
}
