<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
            'status' => '1',
            'type' => '1',
        ]);
        //  Default Users
        \App\Models\User::factory(10)->create();
    }
}
