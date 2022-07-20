<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('vendor/datatables/DataTables-1.12.1//css/dataTables.jqueryui.css') }}">
    <link rel="icon" href="{{ url('img/simpel-kontek.png') }}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary  sidebar sidebar-dark ccordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white m-2 p-4 rounded-3" href="/admin">
                <div class="sidebar-brand-icon ms-1">
                    <img src="img/simpel-kontek.png" height="65px" alt="">
                </div>
                <div style="color: blue" class="sidebar-brand-text mx-3">Dashboard <br>Admin <sup></sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item  {{ $title === 'SIMpel' ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>SIMpel</span>
                </a>
                <div id="collapsePages" class="collapse m-2" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/sertifikat">Layanan Informasi <br> Sertifikasi Kompetensi</a>
                        <a class="collapse-item" href="/kerjasama">Layanan Informasi <br> Kerjasama</a>
                        <a class="collapse-item" href="/penyediaan">Layanan Penyediaan <br> Induk/Benih/Bibit</a>
                        <a class="collapse-item" href="/laboratorium">Layanan Laboratorium</a>
                        <a class="collapse-item" href="/bintek-penelitian-kerjasama">Layanan Bintek, Penelitian <br> dan Kerjasama</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ $title === 'Ruang Belajar Pasif' ? 'active' : '' }}">
                <a class="nav-link" href="/ruang-belajar-pasif">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>Ruang Belajar Pasif</span></a>
            </li>
            <li class="nav-item {{ $title === 'Database Informasi' ? 'active' : '' }}">
                <a class="nav-link" href="/database-informasi">
                    <i class="fa-solid fa-server"></i>
                    <span>Database Informasi</span></a>
            </li>
            <li class="nav-item {{ $title === 'Kontak 24 Jam' ? 'active' : '' }}">
                <a class="nav-link" href="/kontak-24jam">
                    <i class="fa-solid fa-phone"></i>
                    <span>Kontak 24 Jam</span></a>
            </li>
            <li class="nav-item {{ $title === 'Goes Mbak Tri' ? 'active' : '' }}">
                <a class="nav-link" href="/goes-mbak-tri">
                    <i class="fa-solid fa-person-walking"></i>
                    <span>Goes Mbak Tri</span></a>
            </li>
            <li class="nav-item {{ $title === 'Survei Pengguna' ? 'active' : '' }}">
                <a class="nav-link" href="/survei-pengguna">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <span>Survey Pengguna</span></a>
            </li>
            <li class="nav-item {{ $title === 'Pusat Pengaduan' ? 'active' : '' }}">
                <a class="nav-link" href="/pusat-pengaduan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pusat Pengaduan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{ $title === 'Slide Show' ? 'active' : '' }}">
                <a class="nav-link" href="/slide-show">
                    <i class="fa-solid fa-sliders"></i>
                    <span>Slide Show</span></a>
            </li>
            <li class="nav-item {{ $title === 'Info Terkini' ? 'active' : '' }}">
                <a class="nav-link" href="/info-terkini">
                    <i class="fa-solid fa-copy"></i>
                    <span>Info Terkini</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- item -->
            <li class="nav-item {{ $title === 'Setting' ? 'active' : '' }}">
                <a class="nav-link" href="/setting">
                    <i class="fa-solid fa-gears"></i>
                    <span>Setting</span></a>
            </li>
            <li class="nav-item {{ $title === 'User Admin' ? 'active' : '' }}">
                <a class="nav-link" href="/user-admin">
                    <i class="fa-solid fa-users"></i>
                    <span>User Admin</span></a>
            </li>
            <li class="nav-item {{ $title === 'User Android' ? 'active' : '' }}">
                <a class="nav-link" href="/user-android">
                    <i class="fa-solid fa-users"></i>
                    <span>User Android</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('partials.nav')
                <!-- End of Topbar -->
                @yield('container')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Polibang Creative Studios</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

           <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="vendor/datatables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/DataTables-1.12.1/js/dataTables.bootstrap5.min.jss"></script>

    <!-- Custom scripts for all pages-->
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

</body>

</html>
