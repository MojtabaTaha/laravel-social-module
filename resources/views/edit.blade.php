@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Edit Post</h1>
        <form action="/update/{{$posts->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$posts->id}}">
            <div class="form-group">
                <label class="label" for="title">Title</label>
                <input type="text" name="title" id="title"  class="form-control" value="{{$posts->title}}" placeholder="Enter title">
            </div>

                <label>Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" value="{{$posts->image}}">
                    <label class="custom-file-label">Choose File</label>
                </div>
            </div>

            <div class="filed is-grouped">
                <div class="control">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
