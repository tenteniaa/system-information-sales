<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Exports\SupplierExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:suplier-list|suplier-create|suplier-edit|suplier-delete', ['only' => ['index','store']]);
         $this->middleware('permission:suplier-create', ['only' => ['create','store']]);
         $this->middleware('permission:suplier-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:suplier-delete', ['only' => ['destroy']]);
    }
    public function export()
    {
        return Excel::download(new SupplierExport, 'supplier.xlsx');
    }

    public function index()
    {
        return view ('supplier.index',[
        "supplier"=> Supplier::latest()->filter()->paginate(5)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('supplier.create');
    }
    
    public function store(Request $request)
    {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
            ]);
    
            $data = new Supplier();
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->telepon = $request->telepon;
            
            $data->save();
    
            return redirect()->route('supplier.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.show')->with('supplier', $supplier);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit')->with('supplier', $supplier);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $input = $request->all();
        $supplier->update($input);
        return redirect('supplier')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect('supplier')->with('success', 'Data berhasil dihapus!');
    }
}