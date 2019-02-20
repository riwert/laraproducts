<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $title = __('Produkty');

        return view('pages.home', [
            'title' => $title
        ]);
    }
}
