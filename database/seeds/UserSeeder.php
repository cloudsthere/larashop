<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => '123',
                'email' => '123@123.com',
                'password' => '$2y$10$aXj07sjWtQfhxU44E/3bZe9cmbk9ZdQSZz6CqZllFcELv80Nt7vnW',
            ]);
    }
}
