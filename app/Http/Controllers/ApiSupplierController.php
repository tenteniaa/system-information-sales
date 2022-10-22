<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class ApiSupplierController extends Controller
{
    public function index(Request $request)
    {
        //$Makanan = Makanan:: all();
        //return $Makanan;
        $cari=$request->cari;
        $Supplier = Supplier::where('supplier_id', 'LIKE', '%'.$cari.'%')
        ->orWhere('supplier_name', 'LIKE', '%'.$cari.'%')
        ->orWhere('supplier_address', 'LIKE', '%'.$cari.'%')
        ->orWhere('supplier_phone', 'LIKE', '%'.$cari.'%')
        ->paginate(3);
        $Supplier->withPath('Supplier');
        $Supplier->appends($request->all());
        $title = "Supplier";
        return response()->json($Supplier, 200);

    }

    public function show($id)
    {
        $Supplier = Supplier::find($id);
        if (is_null($Supplier)) {
            return response()->json(["message" => "record not found !"], 404);
        }
        return response()->json($Supplier, 200);
    }


}
