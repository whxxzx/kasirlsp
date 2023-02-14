@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header text-white fw-bold"  style="background-color: #af2929">{{ __('Edit Item') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('item.update', $produk->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="kategori">Nama Kategori</label>
                                <select name="category_id" class="form-control form-select" id="category_id" aria-label="Default select example" required>
                                    <option selected value="">Pilih Kategori</option>
                                    @foreach($kategori as $item)
                                    <option value="{{( $item->id )}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="kategori">Nama Item</label>
                                <input type="text" class="form-control" id="edit_produk" name="edit_produk" value="{{ $produk->name}}" placeholder="nama">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="kategori">Harga</label>
                                <input type="number" class="form-control" placeholder="price"  id="edit_price" name="edit_price" value="{{ $produk->price}}">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="kategori">Stok</label>
                                <input type="number" class="form-control" placeholder="stock"  id="edit_stock" name="edit_stock" value="{{ $produk->stock}}">
                            </div>
                            

                            <div class="form-group mt-2">
                                
                                <input type="submit"  class="btn btn-sm btn-success fw-bold text-white btn-circle" value="simpan">
                        
                            </div>
                        </form>
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection