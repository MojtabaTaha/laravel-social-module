<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Likeable;
use App\Concerns;

class Posts extends Model implements Likeable
{
    use Concerns\Likeable;
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
