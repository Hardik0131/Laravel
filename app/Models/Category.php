<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'category_name',
        'image',
        'short_desc',
        'long_desc',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function post(){
        return $this->belongsToMany(Post::class, 'category_post')
        ->withPivot('username')
        ->withTimestamps();
    }
}
