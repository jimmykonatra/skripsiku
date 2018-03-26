<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class,
                KaryawansTableSeeder::class,
                CustomersTableSeeder::class,
                BanksTableSeeder::class,
                JenisPengeluaransTableSeeder::class,
                PerumahansTableSeeder::class,
                PengeluaransTableSeeder::class,
                TipesTableSeeder::class,
                TandaTerimasTableSeeder::class,
                BerkasTableSeeder::class,
                CicilansTableSeeder::class,
                KprsTableSeeder::class, 
                RumahsTableSeeder::class,
                PencairanDanasTableSeeder::class
        ]);
       
    }
}
