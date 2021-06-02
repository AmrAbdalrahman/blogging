<?php

namespace Modules\Category\Repositories;


use App\Interfaces\EntityRepositoryInterface;
use Modules\Category\Entities\Category;

class CategoryRepository implements EntityRepositoryInterface
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $this->category->orderBy('created_at', 'DESC')->get();
    }
}
