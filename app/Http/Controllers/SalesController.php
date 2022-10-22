<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Penjualan;
use App\Models\Pembelian;


class SalesController extends Controller
{
    public function sales () {
		// $pesanan = Pesanan::whereMonth('created_at', Carbon::now()->month)->count();
		// $whatsapp = Pesan::where("media", "whatsapp")->count();
		// $email = Pesan::where("media", "email")->count();
		$barang = Penjualan::where('bayar', '>', 0)->sum("total_item");
		$barangbulan= Penjualan::where('bayar', '>', 0)->whereMonth('created_at', Carbon::now()->month)->sum("total_item");
		$penjualan = Penjualan::where('bayar', '>', 0)->count();
		$penjualanbulan = Penjualan::where('bayar', '>', 0)->whereMonth('created_at', Carbon::now()->month)->count();
		$pembelian = Pembelian::where('bayar', '>', 0)->count();
		$pembelianbulan = Pembelian::where('bayar', '>', 0)->whereMonth('created_at', Carbon::now()->month)->count();

		return response()->json([
			"Jumlah_barang_terjual" => $barang,
			"Jumlah_barang_terjual_perbulan" => $barangbulan,
			"Jumlah_transaksi_penjualan" => $penjualan,
			"Jumlah_transaksi_penjualan_perbulan" => $penjualanbulan,
			"Jumlah_transaksi_pembelian" => $pembelian,
			"Jumlah_transaksi_pembelian_perbulan" => $pembelianbulan
		],200);
	}
}
