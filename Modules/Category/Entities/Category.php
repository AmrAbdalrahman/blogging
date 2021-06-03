<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    function articles()
    {
        return $this->hasMany('Modules\Article\Entities\Article');
    }
}
