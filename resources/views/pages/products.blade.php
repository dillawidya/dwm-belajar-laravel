@extends('layout.main')

@section('content')
   <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="card-body">
                                <h3>Data Produk</h3>
                                <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('add') }}'">
                                    <i class="fas fa-plus">Tambah Data</i>
                                </button>
                                @if (session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Berhasil</strong>{{ session('msg') }}
                                    </div>
                                @endif
                                <table id='example2' class='table table-bordered table-hover mt-3'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Kode produk</th>
                                            <th>Harga</th>
                                            <th>Unit</th>
                                            <th>Stok</th>
                                            <th>Deskripsi</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->product_name}}</td>
                                            <td>
                                                @switch($row->category)
                                                    @case('S')
                                                        Sport
                                                        @break
                                                    @case('D')
                                                        Daily
                                                        @break
                                                    @case('A')
                                                        Accessory
                                                        @break
                                                    @default
                                                        Undefined
                                                @endswitch
                                            </td>
                                            <td>{{ $row->product_code}}</td>
                                            <td>{{ $row->price}}</td>
                                            <td>{{ $row->unit}}</td>
                                            <td>{{ $row->stock}}</td>
                                            <td>{{ $row->description}}</td>
                                            <td>
                                                <button onclick="window.location='{{ url('products/'.$row->product_id) }}'" type="button" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form onsubmit="return deleteData('{{ $row->product_name }}')" style="display: inline" method="POST" action="{{ url('products/'.$row->product_id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Hapus" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <script>
    function deleteData(name){
        pesan = confirm(`Yakin ingin menghapus data ${name} ?`);
        if(pesan) return true;
        else return false;
    }
   </script>
@endsection