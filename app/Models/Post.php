<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content'];

    /**
     * Relation polymorphique de type One to Many avec les commentaire càd un post a plusieurs commentaires et un commentaire appartient à un seul post(article)
     *
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function artist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
