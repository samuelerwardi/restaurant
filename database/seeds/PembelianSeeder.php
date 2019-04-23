<?php

use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\DB::table("suppliers")->insert(
            [
                'nama_supplier' => 'supplier1',
                'alamat' => 'jalan1',
                'provinsi' => 'DKI JAKARTA',
                'telepon' => '021123456',
                'email' => 'supplier1@mail.com',
                'contact_person' => 'person1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
