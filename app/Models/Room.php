<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Room extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
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
    ];

    protected $casts = [
        'room_images' => 'array'
    ];
}
