<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public $timestamps = false;
    public $fillable = ["id", "name", "email", "phone", "discount_code", "total", "payment_method", "status", "isdelete"];

    public function details(){
        return $this->hasmany('App\Models\OrderDetail', 'order_fk');
    }
}
