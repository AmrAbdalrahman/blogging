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
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->category->find($id);
    }

    /**
     * @param AbstractRequest $request
     * @param $id
     * @return mixed|void
     */
    public function update(AbstractRequest $request, $id)
    {
        $category = $this->get($id);
        $category->update($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->category->find($id)->delete();
    }
}
