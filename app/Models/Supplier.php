<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $guarded = [];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('nama', 'like', '%'. request('search').'%')
                         ->orWhere('alamat', 'like', '%'. request('search').'%')
                         ->orWhere('telepon', 'like', '%'. request('search').'%');
        }
    }
}
