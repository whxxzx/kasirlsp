<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\categories;
use App\Models\transactions;
use App\Models\transactions_detail;
use App\Models\carts;
use Illuminate\Support\Facades\Session;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
       $kategori = categories::all();
        $items = item::doesnthave('carts')->where('stock','>',0)->get();
        $carts = item::has('carts')->get()->sortByDesc('carts.create_at');
        // return $items;
       return view('transaksi',compact('items','carts','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function checkout( request $request)
     {
         transactions::create($request->all());
         foreach(carts::all() as $item){
             transactions_detail::create([
                 'transaction_id'       => transactions::latest()->first()->id,
                 'item_id'             =>$item -> item_id,
                 'qty'                 =>$item->qty,
                 'subtotal'            =>$item->item->price * $item->qty,
             ]);
         }
     
         carts::truncate();
     
         return redirect(route('transaksi.show',transactions::latest()->first()->id));
     }

    public function store(Request $request)
    {
        carts::create ($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transactions::findorfail($id);
        return view('DetailTransaksi',compact('transaksi'));


    }

    public function history()
    {
        $transaksi = transactions::all();
        return view('HistoriTransaksi' , compact('transaksi'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=carts::findorfail($id);
        $item->update($request->all());
        return redirect()->back()->with('status','stok sudah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=carts::findorfail($id);
        $item->delete();

        return redirect()->back()->with('status','Item berhasil dihapus');
    }
}
