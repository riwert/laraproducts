<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use App\Mail\ProductCreated;
use App\Mail\ProductUpdated;
use App\Mail\ProductDeleted;
use Mail;

class ProductsController extends Controller
{
    private $limit = 10;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'view']);
    }

    public function index()
    {
        $title = __('Lista produktów');

        $products = Product::orderBy('created_at', 'asc')->paginate($this->limit);

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

        $categories = Category::orderBy('created_at', 'asc')->get();

        return view('products.add', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->user_id = auth()->id();
        $product->setFromRequest();
        $product->save();

        if (request('prices')) {
            $product->savePrices(request('prices'));
        }

        if (request('categories')) {
            $product->saveCategories(request('categories'));
        }

        Mail::to($product->user->email)->send(
            new ProductCreated($product)
        );

        return redirect()->route('products.index')->with('success', __('Produkt został dodany.'));
    }

    public function edit(Product $product)
    {
        $this->authorize('modify', $product);

        $title = __('Edycja produktu ') . $product->name;

        $categories = Category::orderBy('created_at', 'asc')->get();

        return view('products.edit', [
            'title' => $title,
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('modify', $product);

        $product->load('prices');

        $oldProduct = unserialize(serialize($product));
        $product->setFromRequest();
        $product->save();

        if (request('prices')) {
            $product->savePrices(request('prices'));
        }

        if (request('deletePrices')) {
            $product->deletePrices(request('deletePrices'));
        }

        if (request('categories')) {
            $product->saveCategories(request('categories'));
        }

        $product->load('prices');

        Mail::to($product->user->email)->send(
            new ProductUpdated($product, $oldProduct)
        );

        return redirect()->route('products.index')->with('success', __('Zmiany zostały zapisane.'));
    }

    public function delete(Product $product)
    {
        $this->authorize('modify', $product);

        $title = __('Usuwanie produktu ') . $product->name;

        return view('products.delete', [
            'title' => $title,
            'product' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $this->authorize('modify', $product);

        $product->load('prices');

        $product->delete();

        Mail::to($product->user->email)->send(
            new ProductDeleted($product)
        );

        return redirect()->route('products.index')->with('success', __('Produkt został usunięty.'));
    }
}
