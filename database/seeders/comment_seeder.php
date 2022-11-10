<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class comment_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('comments')->insert([
            'comments' => 'tesaegiknopgaibniofn',
            'news_id' => 1 
            
          
            
        ]);
        DB::table('comments')->insert([
            'comments' => 'tesaeafinsa8g8ogopfnsanopga',
            'news_id' => 1 
        ]);
        DB::table('comments')->insert([
            'comments' => 'tesaeafinsa8g8ogopfnsanopga',
            'news_id' => 2 
        ]);
    }
}
