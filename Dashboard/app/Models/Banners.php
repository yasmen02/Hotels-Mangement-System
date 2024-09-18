<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $fillable=[
        'room_id',
        'discount'
    ];
    public function room(){
        return $this->belongsTo(Rooms::class);
    }
}
