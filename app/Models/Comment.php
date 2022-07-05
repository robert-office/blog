<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_post',
        'comment',
    ];

    public function user() {
        return $this->BelongsTo(User::class);
    }

    public function post() {
        return $this->BelongsTo(Post::class);
    }
}
