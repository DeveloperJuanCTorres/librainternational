<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
          $seo = array(
            'title'         => $category->title_seo,
            'description'   => $category->description_seo,
            'keywords'      => $category->keywords,
        );
        // $category = $category->where('type','single')->get();
       return view('categories.show',compact('category','seo'));
    }

    public function showCategory(){
        return view('products.listCategory');
    }
}
