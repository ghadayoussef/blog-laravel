<?php



 //require('app/Post')

namespace App\Http\Controllers;
use App\Post;

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
    function store(Request $request){
        //dd($request);
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
       return redirect()->route('posts.index');
    }
    function show($id){
        $post = Post::find($id);
        return view('posts.show',['post' =>$post]);
    }
    function destroy($id){
        //$post = Post::find($id);
        $post = Post::destroy($id);
        //$post->delete();
        //return dd($post);
       return redirect()->route('posts.index');
    }
    function edit($id){
        $post = Post::find($id);
        return view('posts.edit',['post' => $post]);
        
    }
    function update($id){
        $post = Post::find($id)->firstOrFail();
        //$post = Post::where('id',$id);
        $post->update(['title' => request()->title,
                        'content' => request()->content]);

        return redirect()->route('posts.index');

    }



}
