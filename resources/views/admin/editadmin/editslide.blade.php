<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Slide Show</title>
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
        <a href="/slide-show"><button class="btn btn-primary mb-2"><i
                    class="fa-solid fa-circle-chevron-left me-2"></i>Kembali</button></a>
        <div class="card shadow">
            <form action="{{ url('/slide-show/' . $model->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header grid bg-primary">
                    <h4 class="text-white text-center mt-2 g-col-4">Edit Data Slide Show</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" value="{{ $model->gambar }}" name="gambarlama">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="jabatan" name="judul" placeholder="Judul"
                                required value="{{ $model->judul }}">
                        </div>
                        <label for="nama" class="form-label">icon</label>
                        <input type="file" class="form-control" id="nama" name="gambar" placeholder="Icon"
                            accept="image/gif,image/jpeg,image/jpg,image/png,">
                    </div>
                    <input type="hidden" name="gambarasli" value="{{ $model->gambar }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">Link info</label>
                        <input type="text" class="form-control" id="email" name="link" placeholder="Link"
                            required value="{{ $model->link }}">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1" {{ $model->status === '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $model->status === '0' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
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
