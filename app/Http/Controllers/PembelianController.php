<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Supplier;
use App\Exports\PembelianExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:pembelian-list|pembelian-create|pembelian-edit|pembelian-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pembelian-create', ['only' => ['create','store']]);
         $this->middleware('permission:pembelian-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pembelian-delete', ['only' => ['destroy']]);
    }

    public function export()
    {
        return Excel::download(new PembelianExport, 'pembelian.xlsx');
    }

    public function index()
    {
        $pembelian = Pembelian::with('supplier')->latest()->paginate(5);
        return view ('pembelian.index', compact('pembelian'));
    }
    public function create()
    {
        $supplier = Supplier::all();
        $produk = Produk::all();
        return view('pembelian.create', compact('supplier', 'produk'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'diskon' => 'required',
            'bayar' => 'required',
        ]);

        $data = new Pembelian();
        $data->id_supplier = $request->id_supplier;
        $data->id_produk = $request->id_produk;
        $data->jumlah = $request->jumlah;
        $data->diskon = $request->diskon;
        $data->bayar = $request->bayar;
        
        $data->save();

        return redirect()->route('pembelian.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pembelian = Pembelian::find($id);
        $supplier = Supplier::all();
        $produk = Produk::all();
        return view('pembelian.show', compact('supplier', 'produk'))->with('pembelian', $pembelian);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        Pembelian::destroy($id);
        return redirect('pembelian')->with('success', 'Data berhasil dihapus!');
    }
}