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

    protected $append = ['isReserve_text', 'isReserve_class'];

    public function getisReserveClassAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "badge text-bg-success";
                break;

            case '2':
                return "badge text-bg-danger";
                break;

            default:
                return "badge text-bg-warning";
                break;
        }
    }

    public function getisReserveTextAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "Confirmed";
                break;

            case '2':
                return "Cancel";
                break;

            default:
                return "Pending";
                break;
        }
    }

    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'id');
    }
}
