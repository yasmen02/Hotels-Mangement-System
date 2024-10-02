<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class blogs extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'description',
        'image',
        'url',
        'author'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blogs) {
            $blogs->slug = $blogs->generateUniqueSlug($blogs->title);
        });

        static::updating(function ($blogs) {
            $blogs->slug = $blogs->generateUniqueSlug($blogs->title);
        });
    }
    public function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = Str::slug($title) . '-' . $count++;
        }

        return $slug;
    }
}
