<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Blog extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'subtitle',
        'description',
        'image',
        'created_by',
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
