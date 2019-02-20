<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductPrice;

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

        $product->name = request('name');
        $product->slug = request('slug');
        $product->description = request('description');

        $product->save();

        if (request('prices')) {
            $prices = [];

            foreach (request('prices') as $price) {
                $priceEdit = new ProductPrice();
                $priceEdit->name = $price['name'];
                $priceEdit->value = str_replace(',', '.', $price['value']);
                $priceEdit->unit = $price['unit'];
                $prices[] = $priceEdit;
            }

            $product->prices()->saveMany($prices);
        }

        return redirect('/products')->with('success', __('Produkt został dodany.'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $title = __('Edycja produktu ') . $product->name;

        return view('products.edit', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = request('name');
        $product->slug = request('slug');
        $product->description = request('description');

        $product->save();

        if (request('prices')) {
            $prices = [];

            foreach (request('prices') as $price) {
                $priceEdit = (isset($price['id'])) ? ProductPrice::findOrFail($price['id']) : new ProductPrice();
                $priceEdit->name = $price['name'];
                $priceEdit->value = str_replace(',', '.', $price['value']);
                $priceEdit->unit = $price['unit'];
                $prices[] = $priceEdit;
            }

            $product->prices()->saveMany($prices);
        }

        if (request('deletePrices')) {
            $deletePrices = [];

            foreach (request('deletePrices') as $price) {
                if (isset($price['id'])) {
                    $deletePrices[] = $price['id'];
                }
            }

            ProductPrice::whereIn('id', $deletePrices)->delete();
        }

        return redirect('/products')->with('success', __('Zmiany zostały zapisane.'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $title = __('Usuwanie produktu ') . $product->name;

        return view('products.delete', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')->with('success', __('Produkt został usunięty.'));
    }
}
