<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\sendBill;
use Illuminate\Support\Facades\Mail;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->get('id_category');
        $searchQuery = $request->get('search');

        if ($categoryId) {
            $products = Product::where('fk_category_id', $categoryId)->get();
        } elseif ($searchQuery) {
            $products = Product::where('name', 'like', '%' . $searchQuery . '%')->get();
        } else {
            $products = Product::all();
        }

        $categories = Category::all();
        $productsByCategory = $products->groupBy('fk_category_id');

        return view("products.index", compact('productsByCategory', 'categories', 'products'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("products.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        Mail::to('dany.1701627413@ucaldass.edu.co')->send(new sendBill($product));
        return redirect('/products')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();


        return view("products.show", [
            "product" => $product,
            "slug" => $slug
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("products.edit", [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    public function detailcompra()
    {
        return view("products.detailcompra");
    }
}
