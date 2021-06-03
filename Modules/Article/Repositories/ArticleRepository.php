<?php

namespace Modules\Article\Repositories;

use App\Http\Requests\AbstractRequest;
use App\Interfaces\EntityRepositoryInterface;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\ArticleComments;

class ArticleRepository implements EntityRepositoryInterface
{

    private $article;
    private $articleComments;

    /**
     * CategoryRepository constructor.
     * @param Article $article
     * @param ArticleComments $articleComments
     */
    public function __construct(Article $article, ArticleComments $articleComments)
    {
        $this->article = $article;
        $this->articleComments = $articleComments;
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
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return $this->article->find($id);
    }

    /**
     * @param AbstractRequest $request
     * @param $id
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

    /**
     * @param int $id
     * @return mixed
     */
    public function getWithComments(int $id)
    {
        return $this->article->where('id', $id)->with('comments')->firstOrFail();
    }

    public function addComment(AbstractRequest $request)
    {
        $this->articleComments->create($request->all());
    }
}
