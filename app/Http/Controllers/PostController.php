<?php



 //require('app/Post')

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
    function update(UpdatePostRequest $request,$id){
        $post = Post::find($id)->firstOrFail();
        //$post = Post::where('id',$id);
        // Validator::make($data, [
        //     'content' => [
        //     'required',
        //     Rule::unique('posts')->ignore($this->$id),
        // ]
        // ]);
        $post->update(['title' => $request->title,
                        'content' => $request->content]);

        return redirect()->route('posts.index');

    }
    function upload(StorePostRequest $request){

        $this->validate($request,['select_file' =>'required|image|mimes:jpeg,jpg,png,gif|max:2048']);
        $image = $request->file('select_file');
    }


}
