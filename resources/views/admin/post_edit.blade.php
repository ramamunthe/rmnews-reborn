<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CREATE POST | RM UI</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/RMNews.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&amp;display=swap">
    <script src="https://cdn.tiny.cloud/1/xbxcbxzli7rp657jngvvujp1q7nvuewfkpc3lv91sji02ghf/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <textarea id="editor" rows="30" name="body">
                        {!! $post->body !!}
                      </textarea>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <textarea class="form-control" id="title" name="title">{{ $post->title }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach ($categories as $category)
                            <option {{ $category->id == $post->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags">Tags</label>
                        <select class="form-select basic-multiple" name="tags[]" id="tags" multiple>
                            @foreach ($post->tags as $tag)
                            <option selected value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" accept="image/png, image/jpeg" name="image">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Edit Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
