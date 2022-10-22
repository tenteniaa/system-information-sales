<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $fillable = ['supplier_id', 'supplier_name', 'supplier_address', 'supplier_phone'];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('supplier_id', 'like', '%'. request('search').'%')
                         ->orWhere('supplier_name', 'like', '%'. request('search').'%')
                         ->orWhere('supplier_address', 'like', '%'. request('search').'%')
                         ->orWhere('supplier_phone', 'like', '%'. request('search').'%');
        }
    }
}
