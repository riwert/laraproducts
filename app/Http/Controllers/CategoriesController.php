<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    private $limit = 10;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'view']);
    }

    public function index()
    {
        $title = __('Lista kategorii');

        $categories = Category::orderBy('created_at', 'asc')->paginate($this->limit);

        return view('categories.index', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function view($slug)
    {
        $category = Category::where([
            'slug' => $slug
        ])->first();

        $title = $category->name;

        return view('categories.view', [
            'title' => $title,
            'category' => $category
        ]);
    }

    public function add()
    {
        $this->authorize('manage', Category::class);
        
        $title = __('Dodaj nową kategorię');

        return view('categories.add', [
            'title' => $title
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('manage', Category::class);

        $category = new Category();

        $category->setFromRequest();
        $category->save();

        return redirect()->route('categories.index')->with('success', __('Kategoria została dodana.'));
    }

    public function edit(Category $category)
    {
        $this->authorize('manage', $category);

        $title = __('Edycja kategorii ') . $category->name;

        return view('categories.edit', [
            'title' => $title,
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('manage', $category);

        $category->setFromRequest();
        $category->save();

        return redirect()->route('categories.index')->with('success', __('Zmiany zostały zapisane.'));
    }

    public function delete(Category $category)
    {
        $this->authorize('manage', $category);

        $title = __('Usuwanie kategorii ') . $category->name;

        return view('categories.delete', [
            'title' => $title,
            'category' => $category
        ]);
    }

    public function destroy(Category $category)
    {
        $this->authorize('manage', $category);

        $category->delete();

        return redirect()->route('categories.index')->with('success', __('Kategoria została usunięta.'));
    }
}
