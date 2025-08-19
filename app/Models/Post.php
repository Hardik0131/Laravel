<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'post_name',
        'image',
        'desc',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post')
        ->withPivot('username')
        ->withTimestamps();
    }
}
