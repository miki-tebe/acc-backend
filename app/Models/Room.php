<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Room extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'accommodation_id',
        'name',
        'description',
        'room_price',
        'room_i_price',
        'room_discount',
        'available_room',
        'sharable',
        'room_image',
        'room_images',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'room_images' => 'array'
    ];

    protected $with = [
        'reservations',
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
