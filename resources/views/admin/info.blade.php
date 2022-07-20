@extends('layouts.main')

@section('container')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Info Terkini</h6>
                    <div class="ms-auto">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-gray shadow-sm">Export
                            <i class="fa-solid fa-file-export fa-sm text-secondari-50"></i>
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Tambah
                            <i class="fa-solid fa-circle-plus fa-sm text-white-50"></i>
                        </button>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert mt-1 alert-success text-center alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check text-success"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ url('/info-terkini') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul info</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="icon"
                                        accept="image/gif,image/jpeg,image/jpg,image/png," name="gambar" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Text" class="form-label">Text</label>
                                    <input type="text" class="form-control" id="Text" name="text"
                                        placeholder="Text singkat info" required>
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link Info</label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Link" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul Info</th>
                                <th>Gambar</th>
                                <th>Text Singkat Info</th>
                                <th>Link Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th style="width: 300px">Text Singkat Info</th>
                                <th>Link Info</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datas as $key => $value)
                                <tr>
                                    <td>{{ $value->judul }}</td>
                                    <td>
                                        <img src="{{ asset('storage/info/' . $value->gambar) }}" alt=""
                                            width="70">
                                    </td>
                                    <td>{{ $value->link }}</td>
                                    <td>{{ $value->text }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ url('/info-terkini/' . $value->id . '/edit') }}"><button
                                                    class="btn btn-sm rounded-4 ps-3 pe-3 btn-primary">Edit</button></a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn rounded-4 btn-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#delete">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close m-2 ms-auto" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center mb-3">
                                                    <i class="fa-solid fa-trash text-danger"
                                                        style="font-size: 120px;"></i>
                                                </div>
                                                <h1 class="text-center fw-bold">DELETE</h1>
                                                <h4 class="text-center mb-3">Yakin data akan dihapus?</h4>
                                                <form action="{{ url('/info-terkini/' . $value->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="d-grid gap-2 col-5 mx-auto d-flex">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa-solid fa-trash text-white me-1"></i>Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
