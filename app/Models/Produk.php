<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = [];
    protected $fillable = ['nama_produk', 'id_kategori', 'merk', 'harga_beli', 'diskon', 'harga_jual', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('nama_produk', 'like', '%'. request('search').'%')
                         ->orWhere('id_kategori', 'like', '%'. request('search').'%')
                         ->orWhere('merk', 'like', '%'. request('search').'%')
                         ->orWhere('harga_beli', 'like', '%'. request('search').'%')
                         ->orWhere('diskon', 'like', '%'. request('search').'%')
                         ->orWhere('harga_jual', 'like', '%'. request('search').'%')
                         ->orWhere('stok', 'like', '%'. request('search').'%');
        }
    }
}