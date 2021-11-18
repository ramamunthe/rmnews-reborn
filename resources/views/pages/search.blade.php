@extends('pages.master_page')
@section('title')
Category
@endsection

@section('content')
<section>
    <div class="container">
        <div class="d-grid justify-content-center">
            <h2 class="mb-5 text-center">search results from {{ $query }}</h2>

            @if ($posts->count() == 0)
            <h4 class="text-center">Sorry, the search results were not found!</h4>
            @else
            @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                            <a href="{{ route('home.show', $post->slug) }}" class="stretched-link">
                                <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid h-100 img-cover rounded-start" alt="...">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{!! Str::limit( $post->body, 100) !!}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{  $post->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
@endsection
