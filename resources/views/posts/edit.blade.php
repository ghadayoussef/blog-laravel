@extends('layouts.app')
@section('content')
<form method="POST" action="/post/{{$post->id}}">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="content" rows="3" name="content" value="{{$post->content}}"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  @method('patch')
</form>


@endsection