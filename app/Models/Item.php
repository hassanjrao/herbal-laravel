<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['image_url', 'short_description'];

    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : null;
    }

    public function getShortDescriptionAttribute()
    {
        // remove HTML tags and limit to 100 characters
        return substr(strip_tags($this->description), 0, 100) . '...';
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
