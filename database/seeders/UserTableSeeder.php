<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=\App\Models\User::create([
            'name'=>'ali abass',
            'email'=>'ali@gamil.com',
            'password'=>Hash::make(12345678),
        ]);

        $user->attachRole('superadministrator');
        \App\Models\User::factory()->count(50)->create();
    }
}
