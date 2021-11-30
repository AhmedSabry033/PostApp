<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function ownsPost(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
