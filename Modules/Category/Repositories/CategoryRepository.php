<?php

namespace Modules\Category\Repositories;

use App\Http\Requests\AbstractRequest;
use App\Interfaces\EntityRepositoryInterface;
use Modules\Category\Entities\Category;

class CategoryRepository implements EntityRepositoryInterface
{

    private $category;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->category->orderBy('created_at', 'DESC');
    }

    /**
     * @param AbstractRequest $request
     * @return mixed|void
     */
    public function create(AbstractRequest $request)
    {
        $this->category->create($request->all());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return $this->category->find($id);
    }

    /**
     * @param AbstractRequest $request
     * @param int $id
     * @return mixed|void
     */
    public function update(AbstractRequest $request, int $id)
    {
        $category = $this->get($id);
        $category->update($request->all());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        return $this->category->find($id)->delete();
    }

    /**
     * @return mixed
     */
    public function getAllCategoriesPluck()
    {
        return $this->category->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->category->orderBy('created_at', 'DESC')->get();
    }
}
