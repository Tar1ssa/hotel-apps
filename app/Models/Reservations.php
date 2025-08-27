<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'room_id',
        'reservation_number',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_status',
        'guest_id_card',
        'guest_quantity',
        'guest_checkin',
        'guest_checkout',
        'guest_note',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalamount',
        'tax',
        'night',
        'payment_method',
        'guest_room_number',
        'roomrate'
    ];
}
