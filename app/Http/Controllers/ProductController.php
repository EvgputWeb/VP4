<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required|max:700',
            'image' => 'image'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $file = $request->file('image');
        if (!empty($file)) {
            $imageName = 'game-' . $product->id . '-' . time() . '.jpg';
            copy($file, $_SERVER['DOCUMENT_ROOT'] . '/img/cover/' . $imageName);
            $prod = Product::find($product->id);
            $prod->image_name = $imageName;
            $prod->save();
        }

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
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required|max:700',
            'image' => 'image'
        ]);
        $product = Product::find($prod_id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;

        $file = $request->file('image');
        if (!empty($file)) {
            $imageName = 'game-' . $product->id . '-' . time() . '.jpg';
            copy($file, $_SERVER['DOCUMENT_ROOT'] . '/img/cover/' . $imageName);
            $product->image_name = $imageName;
        }
        $product->save();
        return redirect('/products');
    }

    public function destroy($prod_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/products');
        }
        Product::destroy($prod_id);
        return redirect('/products');
    }


    public function details($prod_id)
    {
        $prod = Product::find($prod_id);
        $count = Product::count();
        $data = [
            'product' => $prod,
            'title' => 'ГеймсМаркет - ' . $prod->name,
            'categories' => Category::all(),
            'products' => Product::all()->random(min(3, $count))
        ];
        return view('product', $data);
    }
}
