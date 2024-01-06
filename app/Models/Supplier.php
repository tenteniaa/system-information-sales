<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $guarded = [];
    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('nama', 'like', '%'. request('search').'%')
                         ->orWhere('alamat', 'like', '%'. request('search').'%')
                         ->orWhere('telepon', 'like', '%'. request('search').'%');
        }
    }
}
