<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_member';
    protected $guarded = [];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('kode_member', 'like', '%'. request('search').'%')
                         ->orWhere('nama', 'like', '%'. request('search').'%')
                         ->orWhere('telepon', 'like', '%'. request('search').'%')
                         ->orWhere('alamat', 'like', '%'. request('search').'%');
        }
    }
}
