<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $fillable = [
        'product_id','order_id','qty'
    ];
}
