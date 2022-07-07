<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);

            $this->addMediaConversion('redondinho')
            ->width(56)
            ->height(56)
            ->sharpen(10);
    }

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'banner_path',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }
}
