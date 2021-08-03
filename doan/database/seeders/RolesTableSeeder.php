<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\capdouser;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        capdouser::truncate();

        capdouser::create(['Name'=>'admin']);
        capdouser::create(['Name'=>'author']);
        capdouser::create(['Name'=>'user']);
    }
}
