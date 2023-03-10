<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Role extends Model {
    use HasFactory, Userstamps;

    protected $fillable = [
        'name', 'slug',
    ];

    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
