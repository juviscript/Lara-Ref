<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Juvi',
            'last_name' => 'Panaguiton',
            'email' => 'jpanaguiton@hernandoclerk.org',
            'password' => 'Welcome1!'
        ]);

        Status::factory()->create([
            'name' => 'Published',
        ]);   
        
        Status::factory()->create([
            'name' => 'Archived',
        ]);
    }
}
