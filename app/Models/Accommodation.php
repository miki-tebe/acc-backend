<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Accommodation extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'summary',
        'category',
        'price',
        'i_price',
        'currency',
        'published',
        'fully_booked',
        'discount',
        'status',
        'tags',
        'commission',
        'accommodation_images',
        'accommodation_pictures',
        'average_rating',
        'total_reviews',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'accommodation_images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
