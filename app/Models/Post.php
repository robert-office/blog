<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'id_user',
        'body',
        'banner_path',
    ];

    public function user() {
        return $this->BelongsTo(User::class);
    }

    public function categories() {
        return $this->hasManyThrough(Category::class, PostCategory::class);
    }
}
