<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super',
            'email' => 'super@super.com',
            'password' => bcrypt('$up3r_SP70'),
        ]);
    }
}
