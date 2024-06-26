<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\News\Database\Factories\NewsFactory;


class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'url',
        'short_description',
        'description',
        'status',
    ];

    protected static function newFactory(): NewsFactory
    {
        return NewsFactory::new();
    }
}
