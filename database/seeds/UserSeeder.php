<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //admin account
        User::create([
                'name' => 'amr',
                'email' => 'amr@admin.com',
                'is_admin' => true,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10),
            ]
        );
        factory('App\User', 10)->create();
    }
}
