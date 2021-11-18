<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> @yield('title') | RM ADMIN</title>
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
    <section class="nav-md hide-sm mb-5">
        <div class="container">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo_brand.png') }}">
                <div class="ms-5 d-flex align-items-center justify-content-between w-100">
                    <input style="max-width: 300px;" type="search" class="form-control" placeholder="search here...">
                    <div class="d-flex align-items-center">
                        @guest
                        <div>
                            <a href="{{ route('login') }}" class="ms-3" href="#">Sign in</a>
                            <a href="{{ route('register') }}" class="ms-3" href="#">Sign up</a>
                        </div>
                        @else
                        <div class="dropdown">
                            <a class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </ul>
                          </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <nav class="nav flex-column nav-pills">
                    <a class="nav-link{{ request()->is('post') ? ' active' : ''}}" href="{{ route('post') }}">Post</a>
                    <a class="nav-link{{ request()->is('category') ? ' active' : ''}}" href="{{ route('category') }}">Categories</a>
                    <a class="nav-link{{ request()->is('tag') ? ' active' : ''}}" href="{{ route('tag') }}">Tags</a>
                </nav>
            </div>
            <div class="offset-md-1 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
