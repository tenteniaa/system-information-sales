<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;

class PelangganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'customer_id' => $row[3],
            'customer_name' => $row[4],
            'customer_address' => $row[5],
            'customer_date' => $row[6],
            'customer_phone' => $row[7],
        ]);
    }
}
