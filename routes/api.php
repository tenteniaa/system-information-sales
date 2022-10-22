<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ApiPelangganController;
use App\Http\Controllers\ApiTpembelianController;
use App\Http\Controllers\ApiProdukController;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware" => "auth:sanctum"], function() {
    // Route::apiResource('pelanggan', ApiPelangganController::class);
    // Route::apiResource('tpem', ApiTpembelianController::class);
    // Route::apiResource('supplier', ApiSupplierController::class);
    // Route::apiResource('produk', ApiProdukController::class);
});

Route::post("login", [AuthController::class, "login"]);

Route::get("sales", [SalesController::class, "sales"]);