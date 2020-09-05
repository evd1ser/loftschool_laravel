<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        $products = Product::with('media')->paginate(9);

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->all([
          'title',
          'price',
          'description',
        ]));

        $product->addMediaFromRequest('cover')
          ->sanitizingFileName(function ($fileName) {
              return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
          })
          ->toMediaCollection('cover');

        $product->categories()
          ->sync($request->input('category_id'));

        return redirect()->route('product.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $ids = $product->categories->pluck('id')
          ->toArray();

        $recomends = Product::with([
          'categories' => function ($query) use ($ids) {
              $query->whereIn('categories.id', $ids);
          }
        ])
          ->where('id', '!=', $product->id)
          ->take(3)
          ->get();

        return view('product.show', ['product' => $product, 'recomends' => $recomends]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.create', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $product->update($request->all([
          'title',
          'price',
          'description',
        ]));

        if ($request->hasFile('cover')) {
            $product->addMediaFromRequest('cover')
              ->sanitizingFileName(function ($fileName) {
                  return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
              })
              ->toMediaCollection('cover');
        }

        $product->categories()
          ->sync($request->input('category_id'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/');
    }
}
