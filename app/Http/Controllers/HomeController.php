<?php

namespace App\Http\Controllers;

use Modules\Article\Repositories\ArticleRepository;
use Modules\Category\Repositories\CategoryRepository;

class HomeController extends Controller
{
    private $categoryRepository;
    private $articleRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepository $categoryRepository
     * @param ArticleRepository $articleRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ArticleRepository $articleRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        $categories = $this->categoryRepository->getAll();
        $articles = $this->articleRepository->paginate();
        return view('home', compact('categories', 'articles'));
    }

}
