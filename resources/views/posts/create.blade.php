@extends('layouts.app')
@section('content')
<form method="POST" action="/posts" enctype="multipart/form-data">
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
    <input type="text" class="form-control"  name="title" placeholder="title">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="content" rows="3" name="content" placeholder="content"></textarea>
  </div>

  <div class="form-group" >
  <div class = "custom-file">
  <input type="file" class="custom-file-input" name="image"><br>
  <label class="custom-file-label">Choose file</label>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection