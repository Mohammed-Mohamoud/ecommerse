<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admins\dashboard;


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
        dashboard::create([
            'frist_name'=>'Mohammed',
            'last_name'=>'Mohamoud',
            'email'=>"Mohammed@215",
            'password'=>bcrypt('12345'),
        ]);

    }
}
