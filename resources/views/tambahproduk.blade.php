@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 ">
                <div class="card ">
                    <div class="card-header fw-bold"  style="background-color: #7fa99b">{{ __('Tambah Item') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('item.store')}}" method="post">

                            @csrf
                            <div class="form-group mb-3">
                                <label for="kategori">nama Kategori</label>
                                <select name="category_id" class="form-control form-select" aria-label="Default select example" id="kategori" required>
                                    <option selected value="">Pilih Kategori</option>
                                    @foreach($kategori as $i => $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="name">Nama Item</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" aria-describedby="helpId">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="" aria-describedby="helpId" min="1">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="stock">Stok</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="" aria-describedby="helpId" min="1">
                            </div>
                            

                            <div class="form-group mt-2">
                                
                                <input type="submit" class="btn btn-sm btn-success fw-bold text-white btn-circle" value="simpan">
                        <a class="btn btn-sm btn-danger fw-bold text-white btn-circle" >Batal</a>
                            </div>
                        </form>
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection