@extends('layouts.app')

@section('title')
Create New Post
@endsection

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 bg-light p-4 m-2">
       <form action="{{route('posts')}}" method="post">
       @csrf
       <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title of the Post" value={{old('title')}}>
            @error('title')
                <div class="p-2 text-danger">{{$message}}</div>
            @enderror
       </div>
       <div class="form-group">
            <label for="category">Select Category</label>
            <select name="category" class="custom-select">
            @foreach ($category as $c)
                <option value={{$c->category}}>{{$c->category}}</option>
            @endforeach
            </select>  
       </div>
       <div class="form-group">
            <textarea name="body" placeholder="Body of the Post" cols="30" rows="10" class="form-control
            @error('body')
                border-danger
            @enderror
            "></textarea>
            @error("body")
                <div class="p-2 text-danger">{{$message}}</div>
            @enderror
       </div>

       <div>
            <button class="btn btn-primary btn-block" type="submit">Create Post</button>
       </div>

       </form>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection
