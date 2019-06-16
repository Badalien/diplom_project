<?php

use Illuminate\Database\Seeder;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ник',
            'patronymic' => 'Админ',
            'second_name' => 'Рутович',
            'email' => 'teacher-admin@gmail.com',
            'password' => bcrypt('password'),
            'address' => '',
            'phone' => '',
            'role' => \App\Models\User::ADMIN_ROLE,
        ]);
    }
}
