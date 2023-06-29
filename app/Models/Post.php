<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    public function userRelation() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postComments() {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
