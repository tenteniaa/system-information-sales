<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TPem;

class ApiTpembelianController extends Controller
{
    public function index(Request $request)
    {
        //$Makanan = Makanan:: all();
        //return $Makanan;
        $cari=$request->cari;
        $Tpem = TPem::where('PONum', 'LIKE', '%'.$cari.'%')
        ->orWhere('PODate', 'LIKE', '%'.$cari.'%')
        ->orWhere('Supplier', 'LIKE', '%'.$cari.'%')
        ->orWhere('Total', 'LIKE', '%'.$cari.'%')
        ->paginate(3);
        $Tpem->withPath('Tpem');
        $Tpem->appends($request->all());
        $title = "Tpem";
        return response()->json($Tpem, 200);

    }

    public function show($id)
    {
        $Tpem = TPem::find($id);
        if (is_null($Tpem)) {
            return response()->json(["message" => "record not found !"], 404);
        }
        return response()->json($Tpem, 200);
    }


}
