<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Bab::insert([
            ['name'=>'Teknik Pemrograman'],
            ['name'=>'Pemrograman Web'],
            ['name'=>'Pemrograman Berorientasi Objek'],
            ['name'=>'Basis Data'],
        ]);
    }
}
