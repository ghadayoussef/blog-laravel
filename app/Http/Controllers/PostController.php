<?php



 //require('app/Post')

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\StorePostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        return view('posts.index',['posts' => Post::all()]);
    }
    function create(){
        //Post
        return view('posts.create');
    }
    function store(StorePostRequest $request){
        //$validated = $request->validated();
        //dd($validated->title);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id
        ]);
       return redirect()->route('posts.index');
    }
    function show($id){
        $post = Post::find($id);
        return $post;
        return view('posts.show',['post' =>$post]);
    }
    // function show(Post $post,$slug){
    //     //return dd($post);
    //     return view('posts.show',compact('post'));
    // }
    function destroy($id){
        $post = Post::destroy($id);
        //$post = Post::find($id);
        //$post->delete();
        //return dd($post);
       return redirect()->route('posts.index');
    }
    function edit($id){
        // $validated = $request->validated();
        // dd($validated);
        $post = Post::find($id);
        return view('posts.edit',['post' => $post]);
        
    }
    function update(StorePostRequest $request,$id){
        $post = Post::find($id)->firstOrFail();
        //$post = Post::where('id',$id);
        $post->update(['title' => $request->title,
                        'content' => $request->content]);

        return redirect()->route('posts.index');

    }



}
