<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public $limit = 5;

    public function home()
    {
        $title = __('Produkty z kategorii promowane');

        $products = Product::whereHas('categories', function($category) {
            $category->where('slug', 'promowane');
        })->orderBy('created_at', 'asc')->paginate($this->limit);

        return view('pages.home', [
            'title' => $title,
            'products' => $products
        ]);
    }
}
