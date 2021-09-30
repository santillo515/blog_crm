<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /**
     * Наша Статистика --отношения не указываются 
     * --будем доставать из статьи --и не будем доставать статью из Статистики
     */
    protected $fillable = [
        'likes',
        'views',
        'article_id'
    ];

    public $timestamps = false;
}
