<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:kategori-list|kategori-create|kategori-delete', ['only' => ['index','store']]);
         $this->middleware('permission:kategori-create', ['only' => ['create','store']]);
         $this->middleware('permission:kategori-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('kategori.index',[
        "kategori"=> Kategori::latest()->filter()->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Kategori::create($input);
        return redirect('kategori')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit')->with('kategori', $kategori);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $input = $request->all();
        $kategori->update($input);
        return redirect() ->route('kategori.index')
                          ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect('kategori')->with('success', 'Data berhasil dihapus!');
    }
}
