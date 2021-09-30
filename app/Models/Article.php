<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory;

    /**
     * Наша Статья
     */
    protected $fillable = [
        'title',
        'body',
        'img',
        'slug'
    ];

    /**
     * Может иметь много комментариев
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Статистика Один к Одному
     */
    public function state()
    {
        return $this->hasOne(State::class);
    }

    /**
     * Взаимоотношение с Тегами Многие ко Многим
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
