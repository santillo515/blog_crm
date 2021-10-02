<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public $dates = [
        'published_at'
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

    /**
     * @return string
     * Оно возвращает преобразованное поле body а именно
     * первые 100 символов
     */
    public function getBodyPreview()
    {
        return Str::limit($this->body, 100);
    }

    /**
     * @return mixed
     * Возвращает преобразованное поле created_at
     * Время когда статья была создана
     * @diffForHumans() преобразует формат времени удобный для людей
     */
    public function createdAtForHumans()
    {
//        return $this->created_at->diffForHumans();
        return $this->published_at->diffForHumans();
    }

    /**
     * @param $query
     * @return mixed
     * Возвращает запрос со всей логикой-дабы не нагружать Controller
     * Также выводим наши посты
     */
    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('tags', 'state')
            ->orderBy('created_at', 'desc')
            ->limit($numbers)
            ->get();
    }

    /**
     * @param $query
     * @param $numbers
     * @return mixed
     * Выводим пагинацию на страницу
     */
    public function scopeAllPaginate($query, $numbers)
    {
        return $query->with('tags', 'state')
            ->orderBy('created_at', 'desc')
            ->paginate($numbers);
    }

    /**
     * @param $query
     * @param $slug
     * @return mixed
     * Поиск статей, ищем первую статью firstOrFail или выбрасываем ошибку
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('comments', 'tags', 'state')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function scopeFindByTag($query)
    {
        return $query->with('tags', 'state')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}
