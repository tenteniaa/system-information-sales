<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'pelanggan-list',
            'pelanggan-create',
            'pelanggan-edit',
            'pelanggan-delete',
            'supplier-list',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
            'produk-list',
            'produk-create',
            'produk-edit',
            'produk-delete',
            'pembelian-list',
            'pembelian-create',
            'pembelian-edit',
            'pembelian-delete',
            'laporan-list',
            'laporan-create',
            'laporan-edit',
            'laporan-delete',
            'katergori-list',
            'katergori-create',
            'katergori-edit',
            'katergori-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}