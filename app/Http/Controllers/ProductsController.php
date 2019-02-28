<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;

class ProductsController extends Controller
{    
    public function index()
    {
        $title = __('Lista produktów');

        $products = Product::all();

        return view('products.index', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function view($slug)
    {
        $product = Product::where([
            'slug' => $slug
        ])->first();

        $title = $product->name;

        return view('products.view', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function add()
    {
        $title = __('Dodaj nowy produkt');

        return view('products.add', [
            'title' => $title
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->setFromRequest();

        $product->save();

        if (request('prices')) {
            $product->savePrices(request('prices'));
        }

        return redirect()->route('products.index')->with('success', __('Produkt został dodany.'));
    }

    public function edit(Product $product)
    {
        $title = __('Edycja produktu ') . $product->name;

        return view('products.edit', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->setFromRequest();

        $product->save();

        if (request('prices')) {
            $product->savePrices(request('prices'));
        }

        if (request('deletePrices')) {
            $product->deletePrices(request('deletePrices'));
        }

        return redirect()->route('products.index')->with('success', __('Zmiany zostały zapisane.'));
    }

    public function delete(Product $product)
    {
        $title = __('Usuwanie produktu ') . $product->name;

        return view('products.delete', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', __('Produkt został usunięty.'));
    }
}
