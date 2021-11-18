@extends('admin.master_admin')
@section('title')
POST
@endsection

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center">
    <h3>All Poasts</h3>
    <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">Create Post</a>
</div>

<div class="card mt-5">
    <div class="card-body table-responsive ">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($posts as $post)
                    <th>{{ $post->created_at->format('d M Y') }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('post.destroy', $post->slug) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{ route('post.show', $post->slug) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3 d-flex justify-content-end">
    {{ $posts->links() }}
</div>
@endsection
