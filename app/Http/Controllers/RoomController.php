<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Room;
use App\Models\Customer;
use App\Models\room_type;
class RoomController extends Controller
{
    public function find_room(Request $request)
    {
        $Ordereds = Order::where(
            function($query) use ($request) {
              return $query
                     ->where('check_in', '<=', $request->check_in)
                     ->where('check_out', '>=', $request->check_out );
             })
             ->orwhere(
                function($query) use ($request) {
                    return $query
                           ->where('check_in', '>=', $request->check_in)
                           ->where('check_in', '<=', $request->check_out);
                   }
             )
             ->get();
        $id_rooms_order = [];
        foreach($Ordereds as $orders)
        {
            foreach($orders->rooms as $room)
            {
                array_push($id_rooms_order,$room->id);
            }
        }
        $room_all = Room::with('room_type')->get();
        $room_search = [];
        foreach($room_all as $room)
        {
            if(!in_array($room->id,$id_rooms_order)) array_push($room_search,$room);
        }
        return $room_search;

    }
    public function book_room(Request $request)
    {
        $customer = new Customer($request->customer);
        $customer->save();
        $order = $customer->orders()->create($request->date);
        $order->rooms()->sync($request->rooms);
        dispatch(new SendEmailJob($order->load('rooms'),$customer->email,$customer->fullname));
        return $order->id;
    }
    public function room_all()
    {
        return room_type::all();
    }
}
