<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'adminkopi',
            'password' => bcrypt('adminkopi'),
            'nama' => 'Admin Kopi',
            'alamat' => 'jln. Admin',
            'tanggal_lahir' => '2020-11-29',
            'no_telp' => '083',
            'jenis_kelamin' => 'laki-laki',
        ]);
        DB::table('customers')->insert([
            'username' => 'customer1',
            'password' => bcrypt('customerkopi'),
            'nama' => 'Customer Pertama',
            'alamat' => 'jln. Customer',
            'tanggal_lahir' => '2020-11-29',
            'no_telp' => '082',
            'jenis_kelamin' => 'perempuan',
        ]);
        DB::table('kurirs')->insert([
            'username' => 'kurirke1',
            'password' => bcrypt('kurirkopi'),
            'nama' => 'Kurir Pertama',
            'alamat' => 'jln. Kurir',
            'tanggal_lahir' => '2020-11-29',
            'no_telp' => '081',
            'jenis_kelamin' => 'laki-laki',
        ]);
    }
}
