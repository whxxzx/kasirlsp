@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
<div class="col-5 text-center">
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
</div></div></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"  style="background-color: #7fa99b">{{ __('Master Transaction') }}</div>

                <div class="card-body">
                   
                    
                    <table class="table table-responsive table-stripped">
                        <thead class="thead-light">
                            <td>No</td>
                            <td>Category</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td class="col-md-2">Stock</td>
                            <td>Action<td>
                        </thead>
                        @foreach ($items as $item)
                            @foreach ($kategori as $categories)
                            <tbody>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$categories->nama }}</td>
                                <td>{{$item->name}}</td>
                                <td>Rp.{{number_format ($item->price) }}</td>
                                <td>{{$item->stock}}</td>
                                <td>
                                    <form action="{{ route('transaksi.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" name="item_id">
                                        <input class="form-control" type="hidden" name="qty" value="1">
                                        <button type="submit" class="btn btn-sm btn-warning text-light"><i class="fas fa-plus"></i></button>
                                    </form>
                                </td>
                                
                            </tbody>
                            @endforeach
                        
                           @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header"  style="background-color: #7fa99b">{{ __('Cart') }}</div>

                <div class="card-body">
                    

                    <table class="table table-responsive">
                        <thead>
                        <td>No</td>
                        <td>Name</td>
                        <td class="col-md-2">Qty</td>
                        <td>Subtotal</td>
                        <td>Action</td>
                        </thead>
                        @if (($carts->isEmpty()))
                        <tr>
                            <td class="text-center" colspan="5">Keranjang Kosong</td>
                        </tr>
                        @else
                        @foreach ($carts as $cart)
                        <tbody>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cart->name}}</td>    
                            <td>
                                <form action="{{route('transaksi.update',$cart->carts->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input min="1" max="{{$cart->stock + $cart->carts->qty}}" type="number" id="qty" class="form-control" 
                                        onchange="update{{$loop->iteration}}()" name="qty" value="{{ $cart->carts->qty }}" >
                                </td>
                            <td>{{$cart->price * $cart->carts->qty}}</td>
                            <td>
                                <input type="submit" class="btn btn-sm btn-primary" id="ubah{{ $loop->iteration }}" style="display: none" value="update">
                                </form>
                                <form action="{{ route('transaksi.destroy', $cart->carts->id)}}" method="POST" class="action">
                                    @csrf
                                    @method('DELETE')
                        
                                   
                                    <!-- gtw nambah style apa -->
                                    <input type="submit" class="btn-danger btn btn-sm" id="hapus{{ $loop->iteration }}"  value="hapus">
                                </form>
                                <script>
                                    function update{{ $loop->iteration }}() {
                                        document.getElementById("ubah{{$loop->iteration}}").style.display = "inline";
                                        document.getElementById("hapus{{$loop->iteration}}").style.display = "none";
                                    }
                                </script>
                            </td>
                            <!-- <td>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-warning btn-sm">Hapus</button>
                            </td> -->
                      
                        @endforeach
                        @endif  
                    </tbody>
                        <form action="{{ route ('transaksi.checkout')}} " method="POST">
                            @csrf
                            <input type="hidden" value="{{ Auth()->user()->id}}" name="user_id" id="user_id">
                            <tbody>
                           
                                <td colspan="2">Total</td>
                                <td colspan="3">
                                    <input type="text" name="total"  class="form-control" readonly
                                    value="{{$carts->sum(function($item) {return $item->price * $item->carts->qty;}) }}"  >
                                </td>
                            </tbody>
                            <tbody>
                                <td colspan="2">Payment</td>
                                <td colspan="3">
                                    <input  type="text" class="form-control" 
                                    min="="{{ $carts->sum(function($item){
                                        
                                        $grand = $item->price * $item->carts->qty;
                                        return $grand;
                                        }) }} 
                                    name="pay_total" required >
                                </td>
                            </tbody>
                        </table>
                        <div class="footer">
                      
                        <input type="submit" class="btn-success btn text-light" name="" id="" value="submit">
                        <a href="" class="btn btn-danger">cancel</a>
                    </div>
                </form>
                    
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection