

<body style="text-align: center;">
    <div style=" display: inline-block;width: 600px;height: 600px;background-size: cover;padding-left: 10%;padding-right: 10%;">
        <p style="color: azure;font-size: 30px;">LANGUNA RESORT</p>
        <div id="main" style="background-color: rgba(0, 0, 0, 0.17);display: inline-block;margin-top: 20px;width: 100%;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;color: #2D55A2;text-align: left;padding-left: 20px;">
            <p>Hello, <i id="name" style="font-weight: 600;">{{$name}}</i></p>
            <p>Thank you for using our service</p>
            <p>Your code number is <i id="code_order" style=" display: inline-block;background-color: green;color: white;font-weight: 600; padding-left: 10px;padding-right: 10px;border-radius: 4px;line-height: 40px;margin-right: 10px;">{{$order->id}}</i></p>
            <p>Your rooms: </p>
               @foreach($order->rooms as $room)
               <i id="code_room" style=" display: inline-block;background-color: green;color: white;font-weight: 600; padding-left: 10px;padding-right: 10px;border-radius: 4px;line-height: 40px;margin-right: 10px;">{{$room->room_number}}</i>
               @endforeach 
        </div>
    </div>
</body>

