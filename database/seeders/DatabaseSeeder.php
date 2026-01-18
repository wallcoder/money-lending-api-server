<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::factory()->create([
            'name' => 'amy',
            'email' => 'amy@example.com',
            'password' => bcrypt('password'),
        ]);

        Customer::create([
            'user_id' => $user->id,
            'full_name' => $user->name,
            'phone' => '8767645263',
            'address' => 'Aizawl',

        ]);
    }
}
