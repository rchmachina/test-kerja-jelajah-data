<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\news;
use Illuminate\Http\Request;
// use App\Models\News;
use Illuminate\Support\Facades\Validator;
class NewscommentController extends Controller
{
    public function index()
    {
        //get all posts from Model
        $comment = comments::with(['index'])->get();
      
        //$news = news::findOrfail($news);
        // dd($new);


        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $comment,
 //           'comment' => $comment
            // 'photo' => $photo
        ], 200);
    }
    public function show($news, $comment) 
    {
        
        $comments = comments::findOrfail($comment);


        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'News'    => $news,
            'data'    => $comments
            //'comment' => $comments
        ], 200);

    }


    public function store($news,Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Comments'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $Comment = comments::create([
                'comments' => $request->Comments,
                'news_id' => $news
            ]);

        if($Comment)
            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $Comment  
            ], 201);
        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }

    public function update($news,$comments,Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'Comments'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $Update_comments = comments::findOrFail($comments);
        $Comment = $Update_comments->update([
                'comments' => $request->Comments,
                'news_id' => $comments
            ]);

        if($Comment)
            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $request->Comments 
            ], 201);
        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }
    public function destroy($comment){
        $del_comment = News::findOrFail($comment);


        if($del_comment){
            $del_comment->delete();

        //creating comments

            
            return response()->json([
                'success' => true,
                'message' => 'deleted',
                'data'    => $del_comment
            ], 201);


        }
    }
}

