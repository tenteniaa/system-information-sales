<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('id_kategori', 'like', '%'. request('search').'%')
                         ->orWhere('nama_kategori', 'like', '%'. request('search').'%');
        }
    }
}
