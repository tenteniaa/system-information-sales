<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CetegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:kategori-list|kategori-create|kategori-edit|kategori-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:kategori-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:kategori-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:kategori-delete', ['only' => ['destroy']]);
    // }

    // public function kategoriexport()
    // {
    //     return Excel::download(new KategoriExport, 'kategori.xlsx');
    // }

    public function index()
    {
        return view ('kategori.index',[
        "kategori"=> Kategori::oldest()->filter()->paginate(5)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('kategori.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required | unique:kategori',
            'nama_kategori' => 'required',
        ]);

        $data = new Kategori();
        $data->id_kategori = $request->id_kategori;
        $data->nama_kategori = $request->nama_kategori;
        
        $data->save();

        return redirect()->route('kategori.index')->with('success', 'Customer added successful!');
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show')->with('kategori', $kategori);
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
                          ->with('success', 'Customer info updated!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect('kategori')->with('success', 'Customer Deleted!');
    }
}
