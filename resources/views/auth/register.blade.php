@extends('layouts.app')

@section('title')
Register
@endsection


@section('content')

<div class="row my-3">
<div class="col-md-3"></div>
    <div class="col-md-6 bg-light p-4 mt-4">

            <form action="{{route('register')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
            <input type="text" name="name" id="" class="form-control @error('name')
                border-danger
            @enderror" placeholder="Your name" value={{old('name')}}>
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
            </div>

                 <div class="form-group">
                    <input type="text" name="username" id="" class="form-control @error('username')
                        border-danger
                    @enderror" placeholder="Your username" value={{old('username')}}>
                    @error('username')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
               </div>
            <div class="form-group">
            <input type="email" name="email" id="" class="form-control @error('email')
                border-danger
            @enderror" placeholder="Your Email" value={{old('email')}}>
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
            <input type="password" name="password" id="" class="form-control" placeholder="Your Password">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="" class="form-control" placeholder="Password Again">
                @error('password_confirm')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>
            <div>
            <div class="form-group">
            <label for="image">Profile Image (Optional)</label>
            <input type="file" name="image" id="" class="" placeholder="Image optional">
                @error('image')
                    <div class="text-danger">{{$message}}</div>
                 @enderror
            </div>
            <div>
            <button class="btn btn-primary btn-block" type="submit">Register</button>
            </div>
            </form>


    </div>
<div class="col-md-3"></div>
</div>

@endsection