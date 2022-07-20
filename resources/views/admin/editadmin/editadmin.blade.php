<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Admin</title>
    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="vendor/datatables/DataTables-1.12.1//css/dataTables.jqueryui.css">
    <link rel="icon" href="{{ url('img/simpel-kontek.png') }}">
</head>

<body style="background-color: whitesmoke">
    <div class="mx-auto m-5" style="width: 70%">
        <a href="/user-admin"><button class="btn btn-primary mb-2"><i
                    class="fa-solid fa-circle-chevron-left me-2"></i>Kembali</button></a>
        <div class="card shadow">
            <form action="{{ url('/user-admin/' . $model->id) }}" method="POST">
                @csrf
                <div class="card-header grid bg-primary">
                    <h4 class="text-white text-center mt-2 g-col-4">Edit Data User Admin</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Nama Lengkap" required value="{{ $model->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="nama"
                            placeholder="Nama Lengkap" required value="{{ $model->jabatan }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Nama Lengkap" required value="{{ $model->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipe Pengguna</label>
                        <select name="type" class="form-control" id="">
                            <option value="Admin" {{ $model->type === 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Super Admin" {{ $model->type === 'Super Admin' ? 'selected' : '' }}>Super
                                Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password" require value="{{ $model->password }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
