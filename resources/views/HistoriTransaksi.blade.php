@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header fw-bold" style="background-color: #7fa99b">
                Transactions History
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Total Transactions</th>
                            <th>Served by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{$item->pay_total}}</td>
                            <th>{{$item->user->name}}</th>
                            <th>
                                <a href="{{route('transaksi.show', $item->id)}}" class="btn btn-success">Struk</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection