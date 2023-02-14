@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('c_success'))
    <div class="alert alert-success" role="alert">
        {{ session('c_success') }}
    </div>
@endif

@if (session('item_success'))
    <div class="alert alert-success" role="alert">
        {{ session('item_success') }}
    </div>
@endif

@if (session('hapus_item'))
    <div class="alert alert-success" role="alert">
       <p> {{ session('hapus_item') }} Berhasil diapus</p>
        
    </div>
@endif
@if (session('hapus_kategori'))
    <div class="alert alert-success" role="alert">
       <p> {{ session('hapus_kategori') }} </p>
        
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="background-color: #7fa99b">
                    <div class="row">
                        <div class="col my-2 fw-bold"  >
                            Daftar Produk
                        </div>

                        <div class="col text-end ">
                            <a  class="btn btn-dark m-0 text-white fw-bold " href="{{route('item.create')}}" style="background-color: #233142"> Tambah Item</a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($items as $i)

                                <tr>
                                    <td>{{$i->name}}</td>
                                    <td>{{$i->stock}}</td>
                                    <td>
                                        
                                        <a href="{{ route('item.edit', $i->id)}}"  class="btn btn-sm btn-warning btn-circle fw-bold"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('item.hapus',$i->id)}}" class="btn btn-sm btn-danger btn-circle fw-bold">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header fw-bold" style="background-color: #7fa99b">
                    <div class="row">
                        <div class="col my-2 fw-bold"  >
                            Daftar Kategori
                        </div>

                        <div class="col text-end ">
                            <a  class="btn btn-dark m-0 text-white fw-bold " href="{{route('kategori.create')}}" style="background-color: #233142"> Tambah Kategori</a>

                        </div>
                    </div>
                   
                    {{-- <div class="col text-end ">
                        <a  class="btn btn-dark m-0 text-white fw-bold " href="{{route('item.create')}}" style="background-color: #233142"> Tambah Item</a>
                    </div> --}}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-responsive table-stripped">
                        <thead class="thead-light fw-bold">
                            <td>No</td>
                            <td>Category</td>
                            <td>Action</td>
                        </thead>
                        @foreach ($categories as $categories)
                            
                       <tr>
                        <td> {{ $loop->iteration}}</td>
                        <td>{{ $categories->nama}}</td>
                       
                            <td>
                                <a href="{{ route('kategori.edit', $categories->id )}}" class="btn btn-sm btn-warning fw-bold text-dark btn-circle" ><i class="fas fa-edit"></i></a>
                                <a href="{{ route('kategori.hapus', $categories->id )}}" class="btn btn-sm btn-danger btn-circle" ><i class="fas fa-trash" ></i></a>
                            </td>
                        
                       </tr>
                       @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
        {{-- <div class="col ">
            <div class="card " >
                <div class="card-header fw-bold" style="background-color: #7fa99b">Tambah Produk</div>

                <div class="card-body ">
                   <form action="">
                    <div class="form-group mb-2">
                        <label class="fw-bold" for="">Nama Kategori </label>
                        <select class="form-select ">
                            <option selected>Belum Memilih Kategori</option>
                            <option value="">Makanan</option>
                            <option value="">Minuman</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label class="fw-bold" for="">Nama Produk </label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group mb-2">
                        <label class="fw-bold" for="">Harga</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label class="fw-bold" for="">Stok</label>
                        <input type="text" class="form-control">
                    </div>
                   

                   <div class="card-footer mt-3">
                    <a  class="btn btn-sm text-dark btn-success fw-bold  btn-circle ">Simpan</a>
                    <a class="btn btn-sm text-white btn-danger fw-bold btn-circle">Cancel</a>
                </div>
            </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
