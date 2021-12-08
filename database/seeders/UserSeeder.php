<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "Admin",
                "email" => "admin@app.com",
                "phone_number" => "6285346147665",
                "role_id" => 1,
                "password" => Hash::make('123123')
            ],
            [
                "name" => "Member",
                "email" => "member@app.com",
                "phone_number" => "6285346147665",
                "role_id" => 2,
                "password" => Hash::make('123123')
            ],
        ];
        DB::table('users')->insert($users);
        // foreach($users as $user) {
        //     $name = explode("@", $user['email'])[0];
        //     Storage::disk('public')->makeDirectory($name);
        // }
    }
}
