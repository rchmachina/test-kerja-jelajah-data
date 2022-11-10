<?php

namespace Database\Seeders;

use App\Models\news;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        news::create([
            
            'judul' => 'test1',
            'isi' => 'fafsanfisanfafawfgj agiokvas',
           ]);
        news::create([
            
            'judul' => 'test2',
            'isi' => 'fafsanfisanfafawfgj agiokvas',
           ]);


    }
    
}
            