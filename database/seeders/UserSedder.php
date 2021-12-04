<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'kendal anel cadiz',
            'email'=>'kendallcadiz1234@gmail.com',
            'password'=>bcrypt('101299')

        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
