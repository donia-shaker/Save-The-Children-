<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  =>  'Super Admin',
            'email' =>  'super_admin@gmail.com',
            'password' =>    Hash::make('123123123'),
            'is_active'=> 1
        ]);

        $user->attachRole('super_admin')->attachPermissions(['all_dashboard','manage_location','manage_services','manage_content']);
    }
}
