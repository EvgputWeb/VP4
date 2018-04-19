<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::all(),
            'allowControls' => (bool)Auth::user()->is_admin
        ];
        return view('products.index', $data);
    }

    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/products');
        }
        $data = [
            'categories' => Category::all()
        ];
        return view('products.create', $data);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/products');
        }
        $this->validate($request, [
            'category_id' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $file = $request->file('image');
        $imageName = 'game-' . $product->id . '-' . time() . '.jpg';
        $file->move('./img/cover', $imageName);

        $prod = Product::find($product->id);
        $prod->image_name = $imageName;
        $prod->save();

        return redirect('/products');
    }

    public function edit($prod_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/products');
        }
        $data = [
            'product' => Product::find($prod_id),
            'categories' => Category::all()
        ];
        return view('products.edit', $data);
    }

    public function update($prod_id, Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/products');
        }
        $product = Product::find($prod_id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;

        $file = $request->file('image');
        if (!empty($file)) {
            $imageName = 'game-' . $product->id . '-' . time() . '.jpg';
            $file->move('./img/cover', $imageName);
            $product->image_name = $imageName;
        }
        $product->save();
        return redirect('/products');
    }





}
