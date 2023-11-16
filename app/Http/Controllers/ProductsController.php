<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.products')->with([
            'products' => Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $validate = $request->validated();

        $products = new Products;
        $products->product_name = $request->product_name;
        $products->category = $request->category;
        $products->product_code = $request->product_code;
        $products->price = $request->price;
        $products->unit = $request->unit;
        $products->stock = $request->stock;
        $products->description = $request->description;
        $products->save();

        return redirect('products')->with('msg', 'Data Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products, $product_id)
    {
        $data = $products->find($product_id);
        return view('pages.edit')->with([
            'product_id' => $data->product_id,
            'product_name' => $data->product_name,
            'category' => $data->category,
            'product_code' => $data->product_code,
            'price' => $data->price,
            'unit' => $data->unit,
            'stock' => $data->stock,
            'description' => $data->description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products, $product_id)
    {
        $data = $products->find($product_id);
        $data->product_name = $request->product_name;
        $data->category = $request->category;
        $data->product_code = $request->product_code;
        $data->price = $request->price;
        $data->unit = $request->unit;
        $data->stock = $request->stock;
        $data->description = $request->description;
        $data->save();

        return redirect('products')->with('msg', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products, $product_id)
    {
        $data = $products->find($product_id);
        $data->delete();

        return redirect('products')->with('msg', 'Data Berhasil Dihapus');
    }
}
