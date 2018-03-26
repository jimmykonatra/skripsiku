<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'username' => 'q',
            'password' => bcrypt('q'),
            'jabatan' => 'Kasir'
            
        ]);

        User::firstOrCreate([
            'username' => 'qwe',
            'password' => bcrypt('qwe'),
            'jabatan' => 'Marketing'
            
        ]);
    }
}
