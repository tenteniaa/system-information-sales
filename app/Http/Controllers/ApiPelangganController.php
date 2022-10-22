<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class ApiPelangganController extends Controller
{
    public function index(Request $request)
    {
        //$Makanan = Makanan:: all();
        //return $Makanan;
        $cari=$request->cari;
        $Pelanggan = Pelanggan::where('customer_id', 'LIKE', '%'.$cari.'%')
        ->orWhere('customer_name', 'LIKE', '%'.$cari.'%')
        ->orWhere('customer_address', 'LIKE', '%'.$cari.'%')
        ->orWhere('customer_date', 'LIKE', '%'.$cari.'%')
        ->orWhere('customer_phone', 'LIKE', '%'.$cari.'%')
        ->paginate(3);
        $Pelanggan->withPath('Pelanggan');
        $Pelanggan->appends($request->all());
        $title = "Pelanggan";
        return response()->json($Pelanggan, 200);

    }

    public function show($id)
    {
        $Pelanggan = Pelanggan::find($id);
        if (is_null($Pelanggan)) {
            return response()->json(["message" => "record not found !"], 404);
        }
        return response()->json($Pelanggan, 200);
    }


}
