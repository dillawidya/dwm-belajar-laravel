<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required',
            'category' => 'required',
            'product_code' => [
                'required',
                Rule::unique('products','product_code')->ignore($this->product_id, 'product_id'),
            ],
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => ':attribute tidak Boleh Kosong',
            'category.required' => ':attribute tidak Boleh Kosong',
            'product_code.required' => ':attribute tidak Boleh Kosong',
            'product_code.unique' => ':attribute Kode Produk Sudah Ada',
            'price.required' => ':attribute tidak Boleh Kosong',
            'unit.required' => ':attribute tidak Boleh Kosong',
            'stock.required' => ':attribute tidak Boleh Kosong',
            'description.required' => ':attribute tidak Boleh Kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'product_name' => 'Nama produk',
            'category' => 'Kategory produk',
            'product_code' => 'Kode produk',
            'price' => 'Harga produk',
            'unit' => 'Satuan produk',
            'stock' => 'Stok produk',
            'description' => 'Deskripsi produk',
        ];
    }
}
