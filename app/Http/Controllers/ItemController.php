<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\categories;
use Illuminate\Support\Facades\Session;
class ItemController extends Controller
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
        $items = item::all();
        return view('item',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = categories::all();
        $items = item::all();
        return view('tambahproduk',compact('kategori','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message =[
            'required'  =>':attribute gaboleh kosong ya bre',
            'dropdown'  => 'dropdown dipilih dong ngab'
        ];
        $this->validate($request,[
          
            'name'   => 'required',
            'stock'          => 'required',
            'price'         => 'required',
        ], $message);

        item::create([
            'category_id'   =>$request->category_id,
            'name'          =>$request->name,
            'stock'          =>$request->stock,
            'price'         =>$request->price,
        ]);

        Session::flash('item_success','sukses bro');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = categories::all();
        $items = item::all();
        $produk = item::find($id);
        return view ('/edititem',compact('items','produk','kategori'));
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
        $message =[
            'required'  =>':attribute gaboleh kosong ya bre',
            'dropdown'  => 'dropdown dipilih dong ngab'
        ];
        $this->validate($request,[
           
            'edit_produk'            => 'required',
            'edit_price'          => 'required',
            'edit_stock'         => 'required',
        ], $message);

        $produk = item::find($id);
        $produk->category_id = $request->category_id;
        $produk->name = $request->edit_produk;
        $produk->price = $request->edit_price;
        $produk->stock = $request->edit_stock;

        $produk->save();
        Session::flash('edit', $produk->name);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = item::find($id);
        $items->delete();
        Session::flash('hapus', $items->name);
        return redirect('/home');
    }

    public function hapus($id)
    {
        $items = item::find($id);
        $items->delete();
        Session::flash('hapus_item', $items->name);
        return redirect('/home');
    }
}
