@extends('layouts.app');

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <post>
                <div class="row">
                    <div class="image">
                        <img src="{{asset('images/photos/'. $post->image)}}" alt="image"/>
                    </div>
                    <div class="describe">
                        <h2> {{ $post->title }}</h2>
                        <p>{{$post->description}}</p>
                    </div>
                    <div  tyle="margin-left:10px" class="button btn-success"><a href="/edit/{{$post->id}}" class="btn btn-success">Edit</a></div>

                    <div><a href="{{route('destroy', $post->id)}}">
                            <button style="margin-left:20px"  type="button" class="btn btn-danger btn-sm">Delete Post</button>
                        </a></div>
                </div>
            </post>
        @endforeach
    </div>

    <div class="container">
        <form action="{{route('addImage')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label">Choose Photo</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Add Caption">
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Describe your adventure!">
            </div>

            <button style="margin-left:20px" type="submit" name="submit" class="btn btn-success">Post It!</button>
        </form>

    </div>

@endsection
