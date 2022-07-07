<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    public $table = 'category_post';

    protected $fillable = [
        'post_id',
        'category_id'
    ];

}
