<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // profile::factory(200)->create();
        // DB::table('profiles')->insert([
        //     'name' => Str::random(20),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        //     'bio' => Str::random(255),
        // ]);
    }
}
