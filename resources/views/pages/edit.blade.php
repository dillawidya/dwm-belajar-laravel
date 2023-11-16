@extends('layout.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h3>Form Edit Produk</h3>
                            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('products') }}'">
                                <i class="fas fa-arrow-left">Kembali</i>
                            </button>
                            <form action="{{ url('products/'.$product_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" value="{{ $product_name }}">
                                        @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                <label>Kategori Produk</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="" selected>--Pilih Kategori</option>
                                        <option value="S" {{ ($category== 'S') ? 'selected' : '' }}>Sport</option>
                                        <option value="D" {{ ($category== 'D') ? 'selected' : '' }}>Daily</option>
                                        <option value="A" {{ ($category== 'A') ? 'selected' : '' }}>Accesoriss</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kode Produk</label>
                                    <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" placeholder="Kode Produk" value="{{ $product_code }}">
                                    @error('product_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi" value="{{ $description }}">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga" value="{{ $price }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Satuan Unit</label>
                                    <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" placeholder="Satuan Unit" value="{{ $unit }}">
                                    @error('unit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Stok" value="{{ $stock }}">
                                    @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection