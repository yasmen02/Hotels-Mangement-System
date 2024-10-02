<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $fillable=[
        'hotel_id',
        'room_number',
        'room_type',
        'room_price',
        'room_image',
        'room_description',
        'room_status',
    ];
    public function hotel(){
        return $this->belongsTo(Hotels::class,'hotel_id','id');
    }
    public function banners(){
        return $this->hasMany(Banners::class);
    }
    public  function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
