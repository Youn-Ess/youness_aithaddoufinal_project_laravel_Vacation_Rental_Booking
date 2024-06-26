<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        DB::table('roles')->insert([
            [
                "name" => 'renter',
                'guard_name' => 'web'
            ],
            [
                "name" => 'owner',
                'guard_name' => 'web'
            ],
            [
                "name" => 'admin',
                'guard_name' => 'web'
            ],
        ]);

        $this->call([
            AdminSeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
