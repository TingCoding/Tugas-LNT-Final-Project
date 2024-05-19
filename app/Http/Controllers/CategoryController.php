<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function add() {
        return view('addCategory');
    }

    function add1(Request $request) {
        $request->validate([
            'Category' => ['required', 'string']
        ]);

        Category::create([
            'Category' => $request->Category
        ]);

        return redirect('/product');
    }
}
