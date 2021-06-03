<?php

namespace Modules\Article\Repositories;

use App\Http\Requests\AbstractRequest;
use App\Interfaces\EntityRepositoryInterface;
use Modules\Article\Entities\Article;

class ArticleRepository implements EntityRepositoryInterface
{

    private $article;

    /**
     * CategoryRepository constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->article->orderBy('created_at', 'DESC');
    }

    /**
     * @param AbstractRequest $request
     * @return mixed|void
     */
    public function create(AbstractRequest $request)
    {
        $this->article->create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->article->find($id);
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
        return $this->article->find($id)->delete();
    }

    /**
     * @param $status
     * @return mixed
     */
    public function filterByPublishStatus($status)
    {
        return $this->article->where('is_published', $status)->get();
    }

    /**
     * @return mixed
     */
    public function paginate()
    {
        return $this->article->paginate(5);
    }

    /**
     * @return mixed
     */
    public function filterByCategory($id)
    {
        return $this->article->where('category_id', $id)->paginate(5);
    }

}
