<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('id_pembelian', 'like', '%'. request('search').'%')
                         ->orWhere('supplier_id', 'like', '%'. request('search').'%')
                         ->orWhere('id_produk', 'like', '%'. request('search').'%')
                         ->orWhere('jumlah', 'like', '%'. request('search').'%')
                         ->orWhere('diskon', 'like', '%'. request('search').'%')
                         ->orWhere('bayar', 'like', '%'. request('search').'%');
        }
    }
}