<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesPermissionsSeeder::class,
        ]);
        // User::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            ['name' => 'Ali', 'email' => 'Ali.Alshikh0999@gmail.com', 'password' => 123456],
            ['name' => 'Sami', 'email' => 'Sami@test.test', 'password' => 123456],
            ['name' => 'Omar', 'email' => 'Omar@test.test', 'password' => 123456],
            ['name' => 'Omar', 'email' => 'Omar555@test.test', 'password' => 123456],
            ['name' => 'samer', 'email' => 'Omar555@test.test', 'password' => 123456],
        ];

        foreach ($users as $user) {

            $user_exist = User::where('email', $user['email'])->first();
            if (!$user_exist) {
                User::firstOrCreate($user);
            }
        }
    }
}
