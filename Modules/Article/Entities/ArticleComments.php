<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;


class ArticleComments extends Model
{

    protected $fillable = ['comment', 'user_id', 'article_id'];

}
