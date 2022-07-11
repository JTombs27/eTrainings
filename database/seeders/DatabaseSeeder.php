<?php

namespace Database\Seeders;

use Database\Seeders\Barangays;
use Illuminate\Database\Seeder;
use Database\Seeders\FirstUserSeed;
use Database\Seeders\Municipalities;
use Database\Seeders\PermissionsSeeder;
use Database\Seeders\PermissionUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            FirstUserSeed::class,
            PermissionUserSeeder::class,
            PermissionsSeeder::class,
            Municipalities::class,
            Barangays::class,
        ]);

        \App\Models\User::factory(100)->create();
    }
}
