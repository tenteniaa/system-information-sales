<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id');
    }
}
