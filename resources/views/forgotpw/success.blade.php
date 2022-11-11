<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BBPBAP | Lupa Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                                        <i class="bi bi-shield-check cek"></i>
                                        <h2 class="mb-4" style="color: black">Email berhasil terkirim</h2>
                                        <p style="color: black">Silahkan cek di email anda untuk mendapatkan link ganti
                                            sandi</p>
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
