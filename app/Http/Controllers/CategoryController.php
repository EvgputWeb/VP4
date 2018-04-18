<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::all(),
            'allowControls' => (bool)Auth::user()->is_admin
        ];
        return view('categories.index', $data);
    }

    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $cat = new Category();
        $cat->name = $request->get('name');
        $cat->description = $request->get('description');
        $cat->save();
        return redirect('/categories');
    }

    public function edit($cat_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $data = [
            'category' => Category::find($cat_id)
        ];
        return view('categories.edit', $data);
    }

    public function update($cat_id, Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $cat = Category::find($cat_id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->save();
        return redirect('/categories');
    }

    public function destroy($cat_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        Category::destroy($cat_id);
        return redirect('/categories');
    }

}
