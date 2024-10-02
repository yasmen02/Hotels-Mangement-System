<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable=[
        'hotel_id',
        'room_id',
        'user_id',
        'check_in_date',
        'check_out_date',
        'no_of_adults',
        'no_of_children',
        'email',
        'phone',
        'total_price',
        'status'
    ];
    public function room(){
        return $this->belongsTo(Rooms::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotels::class);
    }
}
