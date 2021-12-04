<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('/public/posts');
        Storage::makeDirectory('/public/posts');
        
        categories::factory(4)->create();
        tags::factory(8)->create();
        
        $this->call(RoleSedder::class);
        $this->call(UserSedder::class);
        $this->call(PostSedder::class);

        //\App\Models\User::factory(10)->create();
    }
}
