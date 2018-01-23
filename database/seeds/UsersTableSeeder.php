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
            'username' => 'qwe',
            'password' => bcrypt('qwe'),
            'jabatan' => 'Marketing'
            
        ]);

        User::firstOrCreate([
            'username' => 'asd',
            'password' => bcrypt('asd'),
            'jabatan' => 'Kasir'
            
        ]);
    }
}
