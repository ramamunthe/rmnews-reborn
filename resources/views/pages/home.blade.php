@extends('pages.master_page')
@section('title')
    Home
@endsection

@section('content')
<section>
    <div class="container">
        @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
        <div class="row">

            <div class="col-md-7">
                <div id="carouselExampleInterval" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($tanding as $post)
                        <div class="carousel-item" data-bs-interval="10000">
                            <div class="bg-conten-slider">
                                <img src="{{ asset('storage/'. $post->image) }}">
                                <a href="{{ route('home.show', $post->slug) }}">
                                    <div class="vFwcx">
                                        <div class="content-slide">
                                            <h3>{{ $post->title }}</h3>
                                            <label>Published on {{ $post->created_at->diffForhumans() }}</label>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>

                @foreach ($posts as $post)
                <a href="{{ route('home.show', $post->slug) }}" class="text-primary">
                    <div class="d-flex align-items-center mb-3 mt-4">
                        <img class="img-user-home" src="assets/images/RMNews.svg" alt="">
                        <h4>RM {{ $post->category->title }}</h4>
                    </div>
                    <img class="img-home-news" src="{{ asset('storage/'. $post->image) }}" alt="">
                    <h2>{{ $post->title }}</h2>
                    <label>Published on {{ $post->created_at->diffForhumans() }}</label>
                    <div>
                        <span class="me-2">1.2K Views</span>
                        <span class="me-2">1.2K comment</span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="offset-md-1 col-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Tranding</h4>
                    <span>see all</span>
                </div>

                @foreach ($tanding as $post)
                <a href="{{ route('home.show', $post->slug) }}">
                    <div class="d-flex bg-body shadow-sm p-2 mb-3">
                        <img class="img-slide-right" src="{{ asset('storage/'. $post->image) }}" alt="">
                        <div class="ms-2 p-3">
                            <h6>{{ $post->title }}</h6>
                            <span class="text-muted">Published on {{ $post->created_at->diffForhumans() }}</span>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection
