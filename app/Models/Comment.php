<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Взаимоотношение со статьей
     * subject - тема комментария
     * body - текст
     */
    protected $fillable = [
        'subject',
        'body',
        'article_id'
    ];

    /**
     * Комментарий относится к статье
     */
    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
