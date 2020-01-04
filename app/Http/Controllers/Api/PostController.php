<?php

namespace App\Http\Controllers\api;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    public function show($id){
        $post =  Post::find($id);
        return new PostResource($post);
    }
    public function index(){
        //return PostResource::collection(Post::all()::paginate(2));
        //return PostResource::collection(Post::paginate(2));

        // $posts = 
        // dd($posts);
        return PostResource::collection(Post::with('user')->paginate(3));
    }
    public function store(StorePostRequest $request){
        $post = Post::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "user_id"=>$request->user_id
        ]);
        return new PostResource($post);
    }
}
