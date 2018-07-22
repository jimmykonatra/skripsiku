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
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'jabatan' => 'Kasir'
            
        ]);

        User::firstOrCreate([
            'username' => 'qwe',
            'password' => bcrypt('qwe'),
            'jabatan' => 'Marketing'
            
        ]);
    }
}
