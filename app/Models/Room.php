<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\room_type;
class Room extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_room','room_id','order_id');
    }
    public function room_type() 
    {
        return $this->belongsTo(room_type::class,'room_type_id','id');
    }
}
