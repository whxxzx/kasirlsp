@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fw-bold" style="background-color: #7fa99b" >{{ __('Detail Transaction') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table>
                            <tr>
                                <td class="col-md-2">Date: 09-01-2022</td>
                                <td class="col-md-2">Served by:Yanto</td>
                            </tr>
                            
                        </table>

                        <table class="table table-responsive table-bordered fw-bold table-striped mt-2">
                            <thead>
                                <td>No</td>
                                <td>Nama Item</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Total Harga</td>
                            </thead>

                            <tbody>
                                @foreach ($transaksi->detail as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->item->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->item->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                            <tr>
                                <td class="text-end" colspan="4">Grand total =</td>    
                                <td>{{ $transaksi->total }}</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Total Pembaya=</td>    
                                <td>{{ $transaksi->pay_total }}</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Kembalian =</td>    
                                <td>{{ $transaksi->pay_total - $transaksi->total }}</td>
                            </tr>
                        </table>
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>


     
        </div>
    </div>
    
@endsection