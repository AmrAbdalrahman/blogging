<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title', 'description', 'is_published', 'category_id'];

    function articles()
    {
        return $this->belongsTo('Modules\Category\Entities\Category');
    }

    function comments()
    {
        return $this->hasMany('Modules\Article\Entities\ArticleComments');
    }

}
