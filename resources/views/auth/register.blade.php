<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up | RM UI</title>
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

    <div class="container">
        <section class="auth">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('assets/images/RMNews.svg') }}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="bg-login">
                        <h2 class="fw-bold">Sign up</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="name" id="username"
                                    placeholder="Enter username" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email address" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Set password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter your password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                                    placeholder="Confirm password">
                            </div>
                            <div class="mb-3">
                                have an account, <a class="fw-bold" href="{{ route('login') }}">sign in here</a>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Sign up <i
                                        class="fa fa-arrow-right icon-button"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
