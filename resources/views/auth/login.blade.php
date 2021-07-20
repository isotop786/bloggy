@extends('layouts.app')

@section('title')
Login
@endsection


@section('content')

<div class="row my-3">
<div class="col-md-3">
</div>
    <div class="col-md-6 bg-light p-4 mt-4">

        @if(session('status'))
            <div class="alert alert-danger">{{session('status')}}</div>
        @endif


            <form action="{{route('login')}}" method="post" enctype="multipart/form-data" >
            @csrf
           
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
          
                    <div>
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
            </form>


    </div>
<div class="col-md-3"></div>
</div>

@endsection