<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'comment',
        'date',
        'time',

    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


}
