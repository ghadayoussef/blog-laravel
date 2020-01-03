@extends('layouts.app')
@section('content')
<form method="POST" action="/posts">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control"  name="title" placeholder="title">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="content" rows="3" name="content" placeholder="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection