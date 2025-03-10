<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }
}
