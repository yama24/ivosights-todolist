<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToDoListTableSeeder extends Seeder
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
            'yayanmaulana3@gmail.com'
        ];
        DB::collection('todolists')->delete();
        for ($i = 0; $i < 10; $i++) {
            DB::collection('todolists')->insert([
                'task' => fake()->sentence(),
                'user' => $email[rand(0, 1)],
                'done' => fake()->numberBetween(0, 1),
                'created_at' => fake()->unixTime(new DateTime()),
                'updated_at' => fake()->unixTime(new DateTime('+1 day')),
                'expired_at' => fake()->unixTime(new DateTime('+3 weeks')),
            ]);
        }
    }
}
