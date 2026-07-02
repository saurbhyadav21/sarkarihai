<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobFeed extends Model
{
    protected $fillable = [

        'source',

        'article_id',

        'url',

        'title',

        'published_at',

        'status'
    ];
}