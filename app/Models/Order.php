<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Room;
class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['customer_id','check_in','check_out'];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class,'order_room','order_id','room_id');
    }
}
