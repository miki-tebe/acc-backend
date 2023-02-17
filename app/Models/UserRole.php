<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class UserRole extends Model {
    use HasFactory, Userstamps;

    protected $fillable = [
        'user_id', 'role_id',
    ];
}
