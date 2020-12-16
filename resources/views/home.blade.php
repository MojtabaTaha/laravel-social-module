@extends('layouts.app')
@section('content')
    <!-- Carousel -->
    <div class="container-wrapper">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- Сarousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <!-- Carousel Inner -->
            <div class="carousel-inner" role="listbox">
                <!-- Slide One -->
                <div class="carousel-item active">
                    <img src="images/photos/1607943964.jpg" class="d-block w-100 mh-100" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 text-dark">Yeah Its Your Adventure</h2>
                        <h3 class="display-5 text-dark">Just Post it!</h3>
                    </div>
                </div>
                <!-- Slide Two -->
                <div class="carousel-item">
                    <img src="images/photos/1607943828.jpg" class="d-block w-100 mh-100" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 text-dark">Yeah Its Your Adventure</h2>
                        <h3 class="display-5 text-dark">Just Post it!<</h3>
                    </div>
                </div>
                <!-- Slide Three -->
                <div class="carousel-item">
                    <img src="images/photos/1607943886.jpg" class="d-block w-100 mh-100" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 text-dark">Yeah Its Your Adventure</h2>
                        <h3 class="display-5 text-dark">Just Post it!<</h3>
                    </div>
                </div>
                <!-- Carousel Control -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
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
                        <p>Written By : {{$post->user->name}}</p>
                        @if(!auth()->user()->hasLiked($post))
                            <form action="/like" method="post">
                                @csrf
                                <input type="hidden" name="likeable" value="{{ get_class($post) }}">
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <button type="submit" class="btn btn-primary">
                                    Like
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>
                                {{ $post->likes()->count() }} likes
                            </button>
                        @endif
                    </div>
                </div>
            </post>
        @endforeach
    </div>
@endsection
