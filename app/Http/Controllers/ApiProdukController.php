<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ApiProdukController extends Controller
{
    public function index(Request $request)
    {
        $cari=$request->cari;
        $Produk = Produk::where('Nama', 'LIKE', '%'.$cari.'%')
        ->orWhere('Merek', 'LIKE', '%'.$cari.'%')
        ->orWhere('Harga', 'LIKE', '%'.$cari.'%')
        ->orWhere('Stok', 'LIKE', '%'.$cari.'%')
        ->paginate(3);
        $Produk->withPath('Produk');
        $Produk->appends($request->all());
        $title = "Produk";
        return response()->json($Produk, 200);

    }

    public function show($id)
    {
        $Produk = Produk::find($id);
        if (is_null($Produk)) {
            return response()->json(["message" => "record not found !"], 404);
        }
        return response()->json($Produk, 200);
    }
}