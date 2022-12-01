<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                "id" => 1,
                "name" => "wawan",
                "email" => "wawan@gmail.com",
                "email_verified_at" => NULL,
                "password" => bcrypt('12345678'),
                "remember_token" => NULL,
                "created_at" => "2022-12-01 16:10:43",
                "updated_at" => "2022-12-01 16:10:43",
            ),
        );
        User::insert($users);

    }
}
