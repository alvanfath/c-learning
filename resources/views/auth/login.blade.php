<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('landing/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

    <title>Selamat Datang Aplikasi C-Learning</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('landing/images/undraw_remotely_2j6y.svg') }}" style="height: 370px" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Log In</h3>
                                <p class="mb-4">Selamat datang di Aplikasi C-Learning</p>
                            </div>
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div>
                                    <div class="form-group first">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control email @error('email') is-invalid @enderror"
                                            name="email" id="email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <br>
                                <div class="mb-4">
                                    <div class="form-group last">
                                        <label for="password">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script>
        $(document).ready(function(){
            @if ($errors->any() && old('email') != '')
            var field = $('.email').closest('.form-group');
            field.addClass('field--not-empty')
            @endif
        })
    </script>
</body>

</html>
