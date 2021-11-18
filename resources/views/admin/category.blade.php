@extends('admin.master_admin')
@section('title')
CATEGORY
@endsection

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center">
    <h3>All Poasts</h3>
    <a class="btn btn-primary" href="#createModel" data-bs-toggle="modal">Create Post</a>
</div>

<div class="card mt-5">
    <div class="card-body table-responsive ">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($categories as $category)
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('category.destroy', $category->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                            <a  href="#editModal{{ $category->id }}" data-bs-toggle="modal" type="button" class="btn btn-warning btn-sm">Detail</a>
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
    {{ $categories->links() }}
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModel" tabindex="-1" aria-labelledby="createModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title">Title Category</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal Edit -->
@foreach ($categories as $category)
<div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title">Title Category</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ $category->title }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
