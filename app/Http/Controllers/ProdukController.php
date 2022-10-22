<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:produk-list|produk-create|produk-edit|produk-delete', ['only' => ['index','store']]);
         $this->middleware('permission:produk-create', ['only' => ['create','store']]);
         $this->middleware('permission:produk-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:produk-delete', ['only' => ['destroy']]);
    }
    
    public function produkexport()
    {
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }

    public function index()
    {
        $produk = Produk::with('kategori')->latest()->paginate(5);
        return view ('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required | unique:produk',
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required',
            'diskon' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        $data = new Produk();
        $data->id_produk = $request->id_produk;
        $data->id_kategori = $request->id_kategori;
        $data->nama_produk = $request->nama_produk;
        $data->merk = $request->merk;
        $data->harga_beli = $request->harga_beli;
        $data->diskon = $request->diskon;
        $data->harga_jual = $request->harga_jual;
        $data->stok = $request->stok;
        
        $data->save();

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.detail', compact('kategori'))->with('produk', $produk);
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('kategori'))->with('produk', $produk);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $input = $request->all();
        $produk->update($input);
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('produk')->with('success', 'Data Berhasil Dihapus!');
    }
}
