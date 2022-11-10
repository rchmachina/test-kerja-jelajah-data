<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\comment;
use App\Models\comments;
use Illuminate\Database\Eloquent\Collection\paginate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {


        //get all posts from Model

         $all = news::with(['comment'])->paginate(2);

        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $all
          //  'page'    => $page
        ], 200);
    }
    public function show($news) 
    {
        //find post by ID
        $new = News::with(['comment'])->findOrfail($news);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $new 
        ], 200);

    }

    
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Judul'   => 'required',
            'Isi' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'Comments'=> 'nullable'
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $image = $request->file('image');
        $image_uploaded_path = $image->store('users', 'public');
      
        $image_name = basename($image_uploaded_path);
        $image_url = Storage::disk('public')->url($image_uploaded_path);
           
        //save to database
        $news = news::create([
            'judul'     => $request->Judul,
            'isi'   => $request->Isi,
            'photo' => $image_name,
            'image_url'=> $image_url,
            
        ]);



        //success save to database
        if($news){
 
        //creating comments
            comments::create([
                    'comments' => $request->Comments,
                    'news_id' => $news->id
                ]);

            $all = news::with(['comment'])->get();
            
            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $news,
                'all data'    => $all  
            ], 201);


        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }


    public function update(Request $request, $news)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Judul'   => 'required',
            'Isi' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $Update_news = News::findOrFail($news);


        if($Update_news){
            $Update_news->update([
                'judul'     => $request->Judul,
                'isi'   => $request->Isi,
            ]);
        //creating comments

            
            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $Update_news
            ], 201);


        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }
    public function destroy($news){
        $Update_news = News::findOrFail($news);


        if($Update_news){
            $Update_news->delete();

        //creating comments

            
            return response()->json([
                'success' => true,
                'message' => 'deleted',
                'data'    => $Update_news
            ], 201);


        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }

}
