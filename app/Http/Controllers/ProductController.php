<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
{
    $products = Product::latest()->paginate(10);
    return view('products.index', compact('products'));
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name'        => 'required|string|max:255',
        'price'       => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Data berhasil ditambahkan');
}

public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name'        => 'required|string|max:255',
        'price'       => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Data berhasil diubah');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Data berhasil dihapus');
}
}
