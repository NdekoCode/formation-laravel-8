<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    /**
     * Relation polymorphique de type One to Many avec les commentaires càd une video a plusieurs commentaire et un commentaire appartient à une seule videos
     *
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
