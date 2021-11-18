@extends('admin.master_admin')
@section('title')
SHOW
@endsection

@section('content')
<div class="col-md-9">
    <div class="mb-3">
        <a href="{{ route('post.edit', $post->slug) }}" type="button" class="btn btn-primary">Edit Post</a>
    </div>
    <h2>{{ $post->title }}</h2>
    <label class="text-muted">Published on {{ $post->created_at->diffForHumans() }}</label>
    <img class="img-home-news mt-3 mb-3" src="{{ asset('storage/'. $post->image) }}" alt="">
    <div class="paragraph-show">
        {!! $post->body !!}
    </div>

    <div class="mb-5 mt-3">
        @foreach ($post->tags as $tag)
        <label class="me-2 text-primary">#{{ $tag->title }}</label>
        @endforeach
    </div>
</div>

@endsection
