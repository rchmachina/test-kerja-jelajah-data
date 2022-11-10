<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class photo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    DB::table('photos')->insert([
        'photo' => 'ini_fotooo.jpeg',
        'news_id' => 1 ,
        'image_url' => "www.testphoto.com" ,

        
      
        
    ]);
    //    $table->string('photo');
    //     $table->string('file_photo');
    //     $table->string('image_url');


    //     $table->unsignedBigInteger('photo_id');
    }
}
