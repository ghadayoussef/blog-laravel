@extends('layouts.app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">Created at</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $index => $value)
    <tr>
    <th scope="row">{{$value['id']}}</th>
      <td>{{$value['title']}}</td>
      <td>{{$value['content']}}</td>
      <td>{{$value['created_at']}}</td>
      <td>
        
        <form action="{{route('posts.destroy',['post' => $value['id']])}}" method="post">
        <a class="btn btn-primary" style="align" href="{{route('posts.show',['post' => $value['id']])}}" role="button">Show</a>
        <a class="btn btn-primary" style="align" href="{{route('posts.edit',['post' => $value['id']])}}" role="button">Edit</a>
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