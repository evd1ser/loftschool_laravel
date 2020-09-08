<?php

namespace App\Http\ViewComposers;

use App\Product;
use Illuminate\View\View;

class RandomProductComposer
{
    private $product;

    public function __construct(Product $productModel)
    {
        $this->product = $productModel;
    }

    public function compose(View $view)
    {
        $product = $this->product->inRandomOrder()
          ->first();

        return $view->with('randomProduct', $product);
    }
}
