<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Article\Http\Requests\ArticleRequest;
use Modules\Article\Http\Requests\CommentRequest;
use Modules\Article\Repositories\ArticleRepository;
use Modules\Category\Repositories\CategoryRepository;

class ArticleController extends Controller
{

    private $articleRepository;
    private $categoryRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $articleRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if ($request->status) {
                $data = $this->articleRepository->filterByPublishStatus($request->status);
            } else {
                $data = $this->articleRepository->all();
            }

            return datatables()->of($data)
                ->addColumn('actions', function ($data) {
                    $button = '<a class="btn btn-sm btn-info" href="' . route('articles.show', $data->id) . '" >Show <i class="fa fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('articles.edit', $data->id) . '" >Edit <i class="fa fa-edit"></i></a>';

                    $button .= '&nbsp;&nbsp;&nbsp;<a id="' . $data->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $status = ['1' => 'published', 'false' => 'unpublished'];
        return view('article::index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(): Renderable
    {
        $categories = $this->categoryRepository->getAllCategoriesPluck();
        return view('article::add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $this->articleRepository->create($request);
        return redirect('admin/article');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(int $id): Renderable
    {
        $article = $this->articleRepository->get($id);
        return view('article::show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        $categories = $this->categoryRepository->getAllCategoriesPluck();
        $article = $this->articleRepository->get($id);
        return view('article::edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param ArticleRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ArticleRequest $request,int $id)
    {
        $this->articleRepository->update($request, $id);
        return redirect('admin/article');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        $this->articleRepository->destroy($id);
        return redirect('admin/article');
    }

    /**
     * @param int $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryFilter(int $category_id)
    {
        $categories = $this->categoryRepository->getAll();
        $articles = $this->articleRepository->filterByCategory($category_id);
        return view('home', compact('categories', 'articles', 'category_id'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleComments(int $id)
    {
        $article = $this->articleRepository->getWithComments($id);
        return view('article::articleComments', compact('article'));
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(CommentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request['user_id'] = Auth::user()->id;
        $this->articleRepository->addComment($request);
        return redirect()->back();
    }
}
