<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BBPBAP | Lupa Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('css/style-login.css') }}">
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
                                        <img src="{{ url('img/simpelnew.png') }}" class="justify-content-center mt-5"
                                            id="logoatas" style="widht: 200px;height: 200px;">
                                        <h3 class="h3" style="font-weight:bold;">Ubah Sandi</h3>
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
                                    @error('password')
                                        <div class="alert alert-danger text-center alert-dismissible fade show"
                                            role="alert">
                                            Konfirmasi password yang anda masukan tidak sama
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                    <form action="{{ url('/password/reset') }}" method="POST" class="mb-5">
                                        @csrf
                                        <input type="hidden" class="form-control" name="token" required
                                            value="{{ $key }}">
                                        <label for="" class="mt-4">
                                            <h3 class="h6 mb-2" style="font-weight:bold;">Masukan Password baru</h3>
                                        </label>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Masukan sandi baru anda" required>
                                        <label for="" class="mt-4">
                                            <h3 class="h6 mb-2" style="font-weight:bold;">Konfirmasi Password Baru</h3>
                                        </label>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            type="password" name="password_confirmation"
                                            placeholder="Masukan sandi baru anda" required>
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-primary mt-3" type="submit"><i
                                                    class="bi bi-lock-fill"></i>Ubah Sandi</button>
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
