<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
    ];

    // Định nghĩa quan hệ với model Food
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }

    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
