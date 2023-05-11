<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Regu::create([
            'name' => 'Tidak Ada Regu',
        ]);

        \App\Models\Regu::create([
            'name' => 'Regu 1',
        ]);


        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 2,
            'roles' => 'ADMIN',
            'Jabatan' => 'ADMIN',
            'NIP' => '1234567',
        ]);

        \App\Models\User::create([
            'name' => 'Petugas 1',
            'email' => 'petugas1@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 2,
            'roles' => 'PETUGAS LAPANGAN',
            'Jabatan' => 'PETUGAS LAPANGAN',
            'NIP' => '1111111',
        ]);

        \App\Models\User::create([
            'name' => 'Petugas 2',
            'email' => 'petugas2@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 2,
            'roles' => 'PETUGAS LAPANGAN',
            'Jabatan' => 'PETUGAS LAPANGAN',
            'NIP' => '2222222',
        ]);


        \App\Models\User::create([
            'name' => 'ANEV',
            'email' => 'anev@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 1,
            'roles' => 'ANEV',
            'Jabatan' => 'ANEV',
            'NIP' => '8888888',
        ]);

        \App\Models\User::create([
            'name' => 'LABOR',
            'email' => 'labor@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 1,
            'roles' => 'LABOR',
            'Jabatan' => 'LABORATORIUM',
            'NIP' => '9999999',
        ]);

        \App\Models\User::create([
            'name' => 'Struktural',
            'email' => 'struktural@gmail.com',
            'password' => bcrypt('123123123'),
            'regus_id' => 1,
            'roles' => 'Struktural',
            'Jabatan' => 'STRUKTURAL',
            'NIP' => '99898989',
        ]);

        \App\Models\Pendamping::create([
            'name' => 'Pendamping 1',
            'nip' => '123123123123',
            'jabatan' => 'Sapta',
        ]);
    }
}
