@extends('layouts.app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">created by</th>
      <th scope="col">content</th>
      <th scope="col">slug</th>
      <th scope="col">Created at</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $index => $post)
    <tr>
    <th scope="row">{{$post['id']}}</th>      
      <td>{{$post['title']}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post['content']}}</td>
      <td>{{$post['slug']}}</td>
      <td>{{$post['created_at']}}</td>
      <td>
        
        <form action="{{route('posts.destroy',['post' => $post['id']])}}" method="post">
        <a class="btn btn-primary" style="align" href="{{route('posts.show',['post' => $post['id']])}}" role="button">Show</a>
        <a class="btn btn-primary" style="align" href="{{route('posts.edit',['post' => $post['id']])}}" role="button">Edit</a>
        <button type="submit" class="btn btn-primary" >Delete</button>
       @method('delete')
       @csrf
        </form>

       

      </td>

        
    </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')