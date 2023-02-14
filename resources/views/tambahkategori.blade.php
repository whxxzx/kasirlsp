@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
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
                            <label for="nama" class="form-name">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            
                        </div>
                        <input type="submit"  value="Simpan" class="btn btn-sm btn-success fw-bold text-white btn-circle" >
                        <a href="{{ route('home')}}" class="btn btn-sm btn-danger fw-bold text-white btn-circle" >Batal</a>
                    </form>
            
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection