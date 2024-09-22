<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $fillable=[
        'hotel_id',
        'user_id',
        'rating',
        'comment',
        'review_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
