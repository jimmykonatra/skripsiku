<?php

use Illuminate\Database\Seeder;
use App\JualRumah;

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
                PencairanDanasTableSeeder::class,
                TipesTableSeeder::class,
                BerkasTableSeeder::class,
                CicilansTableSeeder::class,
                RumahsTableSeeder::class,
                JualRumahsTableSeeder::class,
                KprsTableSeeder::class,
                TandaTerimasTableSeeder::class,
                PembangunansTableSeeder::class,
                PengeluaransTableSeeder::class
                
                
                
        ]);
       
    }
}
