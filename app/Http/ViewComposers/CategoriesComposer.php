<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        return $view->with('categories', Category::limit(Category::COUNT_LIMIT)->get());
    }
}
