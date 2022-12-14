<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Exports\PelangganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:pelanggan-list|pelanggan-create|pelanggan-edit|pelanggan-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pelanggan-create', ['only' => ['create','store']]);
         $this->middleware('permission:pelanggan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pelanggan-delete', ['only' => ['destroy']]);
    }

    public function pelangganexport()
    {
        return Excel::download(new PelangganExport, 'pelanggan.xlsx');
    }

    public function index()
    {
        return view ('pelanggan.index',[
        "pelanggan"=> Pelanggan::oldest()->filter()->paginate(5)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('pelanggan.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kode_member' => 'required | unique:pelanggan',
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $data = new Pelanggan();
        $data->kode_member = $request->kode_member;
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        
        $data->save();

        return redirect()->route('pelanggan.index')->with('success', 'Customer added successful!');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.show')->with('pelanggan', $pelanggan);
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.edit')->with('pelanggan', $pelanggan);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $input = $request->all();
        $pelanggan->update($input);
        return redirect() ->route('pelanggan.index')
                          ->with('success', 'Customer info updated!');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect('pelanggan')->with('success', 'Customer Deleted!');
    }
}
