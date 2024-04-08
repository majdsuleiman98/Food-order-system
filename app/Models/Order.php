<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function meal()
    {
        return $this->belongsToMany(Meal::class, 'cards', 'order_id', 'meal_id','id','id');
    }

}
