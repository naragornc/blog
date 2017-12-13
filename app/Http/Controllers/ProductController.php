<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        return response()->json($product);
    }

    public function store(Request $request) {
        $product = new Product([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $product->save();

        return response()->json('Product Added Successfully.');
    }

    public function edit($id) {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->title = $request->get('title');
        $product->body = $request->get('body');
        $product->save();

        return response()->json('Product Updated Successfully.');
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete():

        return response()->json('Product Deleted Successfully.');
    }
}
