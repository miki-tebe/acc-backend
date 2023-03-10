<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Reservation extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'user_id',
        'accommodation_id',
        'room_id',
        'status',
        'currency',
        'checked_in',
        'checked_out',
        'payment_type',
        'price',
        'canceled_reason',
        'commission',
        'source',
        'booking_date',
        'notes',
        'room_size',
        'adults',
        'children',
        'code',
        'total_price',
        'total_stay',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
