<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategory;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', [
          'except' => [
            'index',
            'show'
          ]
        ]);

        $this->middleware('admin', [
          'except' => [
            'index',
            'show'
          ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $category = Category::create($request->all([
          'name',
          'description',
        ]));

        return redirect()->route('category.show', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->products()
          ->paginate();

        return view('category.show', [
          'category' => $category,
          'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.create', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategory $request, Category $category)
    {
        $category->update($request->all([
          'name',
          'description'
        ]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('home');;
    }
}
