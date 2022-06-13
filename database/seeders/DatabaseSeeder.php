<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Add the master administrator, user id of 1
        User::create([
            'name' => 'm1r31lle',
            'email' => 'matthieu@lopezjover.fr',
            'password' => bcrypt('mEs_10tooR'),
            'email_verified_at' => now(),
        ]);
    }
}
