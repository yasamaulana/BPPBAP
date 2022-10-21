@extends('layouts.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid ps-5 pe-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <div class="col">
                <a href="/sertifikat" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-lightbulb fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Informasi Pelayanan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/ruang-belajar-pasif" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-lightbulb fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Ruang Belajar Pasif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/database-informasi" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fas fa-server fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Database Informasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/kontak-24jam" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fas fa-phone fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Konsultasi Teknis 24 Jam
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/goes-mbak-tri" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fas fa-person-walking fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Goes Mbak Tri</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/survei-pengguna" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-square-poll-vertical fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Survey Pengguna</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="/pusat-pengaduan" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Pusat Pengaduan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <div class="col">
                <a href="/slide-show" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-sliders fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Slide Show</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/info-terkini" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-copy fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">Info Terkini</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <!--<div class="col">
                    <a href="/setting" style="text-decoration: none">
                        <div class="card bg-primary shadow h-100 py-2 rounded-4">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="m-3 fas fa-solid fa-gears fa-2x text-gray-300"></i>
                                        </div>
                                        <div class="text-center h5 mb-0 font-weight-bold text-white">Setting</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->
            <div class="col">
                <a href="/user-android" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fas fa-solid fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">User Admin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/user-android" style="text-decoration: none">
                    <div class="card bg-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="m-3 fa-solid fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-center h5 mb-0 font-weight-bold text-white">User Android</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
