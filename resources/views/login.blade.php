<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BBPBAP | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style-login.css">
</head>

<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-m-4 col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="p-3">
                                    <div class="text-center">
                                        <img src="img/simpelnew.png" class="justify-content-center mt-5" id="logoatas"
                                            style="widht: 200px;height: 200px;">
                                        <h3 class="h6 text-primary mb-3" style="font-weight:bold;">Dashboard Admin</h3>
                                        <h3 class="h3" style="font-weight:bold;">Login In Admin</h3>
                                        <h3 class="h6 mb-2" style="font-weight:bold;">Masukkan Email dan Password</h3>
                                    </div>
                                    @if (session()->has('success'))
                                        <div class="alert mt-1 alert-success text-center alert-dismissible fade show"
                                            role="alert">
                                            <i class="fa-solid fa-circle-check text-success"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('eror'))
                                        <div class="alert alert-danger text-center alert-dismissible fade show"
                                            role="alert">
                                            {{ session('eror') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="exampleInputEmail1" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="username"><i
                                                        class="bi bi-person-circle"></i></span>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="username" value="{{ old('email') }}" name="email"
                                                    aria-describedby="inputGroupPrepend" required
                                                    placeholder="Username">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="password"><i
                                                        class="bi bi-key-fill"></i></span>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" aria-describedby="inputGroupPrepend"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="d-grid gap-2 mb-5">
                                            <button class="btn btn-primary" name="masuk" type="submit">Log
                                                In</button>
                                            <a href="/lupa-password" class="text-center"
                                                style="text-decoration: none">Lupa password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>
