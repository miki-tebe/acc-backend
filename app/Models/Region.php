<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Region extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name',
        'description',
        'picture',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}
