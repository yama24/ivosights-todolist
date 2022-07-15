<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = [
            'maulana24@live.com',
            'yayanmaulana3@live.com'
        ];

        DB::collection('users')->delete();
        for ($i = 0; $i < count($email); $i++) {
            DB::collection('users')->insert([
                'name' => fake()->name(),
                'email' => $email[$i],
                'email_verified_at' => fake()->unixTime(new DateTime()),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
        }
    }
}
