@extends('pages.master_page')
@section('title')
    Show News
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">

            <div class="col-md-7">
                <h2>{{ $post->title }}</h2>
                <label class="text-muted">Published on {{ $post->created_at->diffForHumans() }}</label>
                 &middot;
                <label>{{ $post->category->title }}</label>
                <img class="img-home-news mt-3 mb-3" src="{{ asset('storage/'. $post->image) }}" alt="">
                <div class="paragraph-show">
                    {!! $post->body !!}
                </div>

                <div class="mb-5">
                    @foreach ($post->tags as $tag)
                        <label class="me-2 text-primary">#{{ $tag->title }}</label>
                    @endforeach
                </div>

                <div>
                    <div class=" mb-3 w-75">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="assets/images/news.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h6 class="card-title mb-0">Card title</h6>
                              <p class="card-text mb-0">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class=" mb-3 w-75 float-end" >
                        <div class="row g-0">
                          <div class="col-md-8">
                            <div class="card-body">
                              <h6 class="card-title mb-0">Card title</h6>
                              <p class="card-text mb-0">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <img src="assets/images/news.jpg" class="img-fluid rounded-start" alt="...">
                          </div>
                        </div>
                      </div>
                </div>

                <div class="mb-5">
                    <form method="post" action="#">
                        <textarea class="form-control mb-3" rows="5" name="" placeholder="comment..."></textarea>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>

            <div class="offset-md-1 col-md-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Latest news</h4>
                    <span>see all</span>
                </div>

                @foreach ($lates as $post)
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
