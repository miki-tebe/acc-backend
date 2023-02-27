<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Reservation extends Model {
    use HasFactory, Userstamps;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
