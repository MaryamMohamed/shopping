<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Ahmed Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01121445337',
            'password' => bcrypt('12345678'),
        ]);
    }
}
