<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'comment_id',
        'comment',
        'date',
        'time',

    ];

    public function users()
    {
        return $this->belongsTo(User::class,"user_id", "id");
    }
    public function comments()
    {
        return $this->belongsTo(Comment::class,"comment_id", "id");
    }
}
