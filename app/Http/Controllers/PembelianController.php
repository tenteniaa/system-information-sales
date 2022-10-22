<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Exports\PembelianExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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

    public function pembelianexport()
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
            'id_pembelian' => 'required | unique:pembelian',
            'supplier_id' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required',
            'diskon' => 'required',
            'bayar' => 'required',
        ]);

        $data = new Pembelian();
        $data->id_pembelian = $request->id_pembelian;
        $data->supplier_id = $request->supplier_id;
        $data->id_produk = $request->id_produk;
        $data->jumlah = $request->jumlah;
        $data->diskon = $request->diskon;
        $data->bayar = $request->bayar;
        
        $data->save();

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $pembelian = Pembelian::find($id);
        $supplier = Supplier::all();
        $produk = Produk::all();
        return view('pembelian.detail', compact('supplier', 'produk'))->with('pembelian', $pembelian);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::find($id);
        $input = $request->all();
        $pembelian->update($input);
        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Pembelian::destroy($id);
        return redirect('pembelian')->with('success', 'Purchase Transaction Deleted!');
    }
}