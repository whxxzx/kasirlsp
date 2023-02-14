<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\item;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
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
        $categories = categories::all();
        return view('kategori',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'required' => 'Harus diisi ya rek',
        ];

        $validateData = $request->validate([
            'nama' => 'required',
        ], $message);

        categories::create([
            'nama'  => $request->nama,
        ]);

        Session::flash('c_success','kategori ditambahkan');
        
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
        $kategori = categories::find($id);
        return view('editkategori',compact('kategori'));
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
       $kategori = categories::find($id);

       $kategori->name = $request->edit_kategori;
       $kategori->save();

       Session::flash('c_success','Kategori berhasil diUpdate');
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
        $kategori::findorfall($id);
        $kategori->delete();
        Session::flash ('hapus_kategori','Kategori Terhapus');
        return Redirect('/home');
    }

    public function hapus($id)
    {
        $kategori = categories::findorfail($id);
        $kategori->delete();
        Session::flash ('hapus_kategori','Kategori Terhapus');
        return Redirect('/home');
    }
}

