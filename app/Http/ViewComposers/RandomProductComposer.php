<?php

namespace App\Http\ViewComposers;

use App\Product;
use Illuminate\View\View;

class RandomProductComposer
{
    public function compose(View $view)
    {
        $product = Product::inRandomOrder()
          ->first();

        return $view->with('randomProduct', $product);
    }
}
