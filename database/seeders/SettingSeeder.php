<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id' => 1,
            'nama_perusahaan' => 'Kelompok 6',
            'alamat' => 'Gotham City',
            'telepon' => '08111111111',
            'tipe_nota' => 1,
        ]);
    }
}
