<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = $this->categoryRepository->all();

            return datatables()->of($data)
                ->addColumn('actions', function ($data) {
                    $button = '<a class="btn btn-sm btn-info" href="' . route('categories.show', $data->id) . '" >Show <i class="fa fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('categories.edit', $data->id) . '" >Edit <i class="fa fa-edit"></i></a>';

                    $button .= '&nbsp;&nbsp;&nbsp;<a id="' . $data->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('category::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::add');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request);
        return redirect('admin/category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = $this->categoryRepository->get($id);
        return view('category::show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->get($id);
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->update($request, $id);
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        return redirect('admin/category');
    }
}
