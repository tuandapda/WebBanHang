<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        
        $data1=[
            
            'Name'=>'tuan96',
            'password'=>bcrypt('123'),
            'Email'=>'giatuan@gmail.com',
            'CapDoID'=>1,
        ];
        DB::table('users')->insert($data1);
    }
}
