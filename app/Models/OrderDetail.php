<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'food_id', 'quantity', 'price'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}

