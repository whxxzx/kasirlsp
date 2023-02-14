@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header fw-bold" style="background-color: #7fa99b">{{ __('Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table  table-responsive table-stripped">
                        <thead class="thead-light fw-bold">
                            <td>No</td>
                            <td>Kategori</td>
                            <td>Nama</td>
                            <td>Harga</td>
                            <td>Stok</td>
                            <td>Action</td>
                        </thead>

                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->categories->name}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ number_format($item->price)}}</td>
                            <td>
                                <a  class="btn btn-sm btn-warning fw-bold text-dark btn-circle" >Edit</a>
                                <a class="btn btn-sm btn-danger fw-bold text-white btn-circle" >Reset</a>
                            </td>
                    </tr>
                    @endforeach
                       
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header fw-bold" style="background-color: #7fa99b">{{ __('Tambah Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    <form action="">
                        <div class="mb-3 mt-2">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="" id="" class="form-control form-select">
                                    <option value="">Food</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="nama" class="form-name">Nama:</label>
                                <input type="text" class="form-control" id="nama" >
                            </div>
                           
                            <div class="form-group mb-3">
                                <label for="price" class="form-name">Price:</label>
                                <input type="text" class="form-control" id="price">
                            </div>
                            <div class="form-group mb-3">
                                <label for="stock" class="form-name">Stock:</label>
                                <input type="text" class="form-control" id="stock">
                            </div>
                        </div>
                        <hr>
                        <a  class="btn btn-sm btn-success fw-bold text-white btn-circle" >Simpan</a>
                        <a class="btn btn-sm btn-danger fw-bold text-white btn-circle" >Reset</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection