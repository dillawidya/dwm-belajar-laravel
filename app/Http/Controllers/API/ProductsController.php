<?php

namespace App\Http\Controllers\API;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use App\Http\Controllers\Controller;


class ProductsController extends Controller
{
    public function index(){
        $product = Products::all();
        return response()->json([
            'status' => 'success',
            'massage' => 'data ditemukan',
            'data' => $product
        ]);
    }

    public function show($product_id){
        $product = Products::find($product_id);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'massage' => 'data ditemukan',
                'data' => $product
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'massage' => 'data tidak ditemukan',
                'data' => null
            ],404);
        }
        
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
        'product_name' => 'required',
        'category' => 'required',
        'product_code' => 'required',
        'price' => 'required',
        'unit' => 'required',
        'stock' => 'required',
        'description' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'massage' => 'data tidak valid',
                'data' => $validate->errors()
            ],422);
        }
        
        $products = Products::create([
        'product_name' => $request->product_name,
        'category' => $request->category,
        'product_code' => $request->product_code,
        'price' => $request->price,
        'unit' => $request->unit,
        'stock' => $request->stock,
        'description' => $request->description
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'data telah dibuat',
            'data' => $products
        ]);
    }

    public function update(Request $request, $product_id){
        $validate = Validator::make($request->all(),[
            'product_name' => 'required',
            'category' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'description' => 'required'
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'status' => 'error',
                    'massage' => 'data tidak valid',
                    'data' => $validate->errors()
                ],422);
            }
        $products = Products::where('product_id', $product_id)->update([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'description' => $request->description
        ]);
        if ($products) {
            $products = Products::find($product_id);
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil diupdate',
                'data' => $products
            ]);
        }
    }

    public function destroy($product_id){
        $product = Products::find($product_id);
        if (!$product) {
            return response()->json([
            'status' => 'error',
            'mesaage' => 'data tidak ditemukan',
            'data' => null
            ],422);
        }
        $product->delete();
        return response()->json([
            'status' => 'success',
            'mesaage' => 'data berhasil dihapus',
            'data' => null
        ]);
        
        

    }

}
