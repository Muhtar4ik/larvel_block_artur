<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $filable = [
        "title",
        "content",
        "is_published",
        "likes",
        "slug",
        "user_id",
        "theme"
    ];


    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
