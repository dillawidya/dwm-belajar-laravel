@extends('layout.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h3>Form Tambah Produk</h3>
                            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ route('hello') }}'">
                                <i class="fas fa-arrow-left">Kembali</i>
                            </button>
                            <form action="{{ url('products') }}" method="post">
                                @csrf
                                <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('product_name') }}">
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
                                        <option value="S" {{ (old('category')== 'S') ? 'selected' : '' }}>Sport</option>
                                        <option value="D" {{ (old('category')== 'D') ? 'selected' : '' }}>Daily</option>
                                        <option value="A" {{ (old('category')== 'A') ? 'selected' : '' }}>Accesoriss</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kode Produk</label>
                                    <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" placeholder="Kode Produk" value="{{ old('product_code') }}">
                                    @error('product_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi" value="{{ old('description') }}">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Satuan Unit</label>
                                    <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" placeholder="Satuan Unit" value="{{ old('unit') }}">
                                    @error('unit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="Stok" value="{{ old('stock') }}">
                                    @error('stock')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                </div>
                                <label for="" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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