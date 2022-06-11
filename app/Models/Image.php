<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'path'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Une relation de un à un avec une image ainsi qu'une
     *
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
