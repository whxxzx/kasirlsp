@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header fw-bold" style="background-color: #7fa99b">{{ __('Kategori') }}</div>

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
                        <td>{{ $categories->name}}</td>
                       
                            <td>
                                <a  class="btn btn-sm btn-warning fw-bold text-dark btn-circle" ><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger btn-circle" ><i class="fas fa-trash" ></i></a>
                            </td>
                        
                       </tr>
                       @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" style="background-color: #7fa99b">{{ __('Tambah Kategori') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('kategori.store')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-name">Nama:</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                            
                        </div>
                        <input type="submit"  value="Simpan" class="btn btn-sm btn-success fw-bold text-dark btn-circle" >
                        <a href="{{ route('home')}}" class="btn btn-sm btn-danger fw-bold text-white btn-circle" >Batal</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection