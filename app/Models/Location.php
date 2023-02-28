<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Location extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'place_name',
        'common_name',
        'lat',
        'long',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
