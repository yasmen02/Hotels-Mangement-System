<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotels extends Model
{
    use HasFactory;
    protected $fillable=[
        'slug',
        'name',
        'address',
        'contact_number',
        'stars',
        'hotel_image'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hotels) {
            $hotels->slug = $hotels->generateUniqueSlug($hotels->name);
        });

        static::updating(function ($hotels) {
            $hotels->slug = $hotels->generateUniqueSlug($hotels->name);
        });
    }
    public function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count++;
        }

        return $slug;
    }
    public function rooms(){
        return $this->belongsTo(Rooms::class);
    }
    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
