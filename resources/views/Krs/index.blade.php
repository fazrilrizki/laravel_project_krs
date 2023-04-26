<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Universitas ABC | Kartu Rencana Studi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout" role="button">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">SKS Maksimal : 20</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Universitas ABC</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @foreach ($mhs as $getMhs)
                        <a class="d-block">Nama : {{ $getMhs->nama }}</a>
                        @endforeach
                        <a class="d-block">Nim : {{ session('getNim') }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Kartu Rencana Studi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../tables/data.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pilihan Mata Kuliah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Kartu Rencana Studi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kartu Rencana Studi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @if(session()->has('matkulFailed'))
                <div class="alert alert-warning" role="warning">
                    {{ session('matkulFailed') }}
                </div>
                @endif
                @if(session()->has('sksFailed'))
                <div class="alert alert-warning" role="warning">
                    {{ session('sksFailed') }}
                </div>
                @endif
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pilihan Mata Kuliah Anda :</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <a class="btn btn-app" href="/generatePDF" role="button">
                                            <i class="fas fa-save"></i> Save/Export to PDF
                                        </a>
                                        <thead>
                                            <tr>
                                                <th>Mata Kuliah</th>
                                                <th>Kode MK</th>
                                                <th>SKS</th>
                                                <th>SMT</th>
                                                <th>Kelas</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($krs as $getKrs)
                                            <tr>
                                                <td>{{ $getKrs->namamk }}</td>
                                                <td>{{ $getKrs->kodemk }}</td>
                                                <td>{{ $getKrs->sks }}</td>
                                                <td>{{ $getKrs->semester }}</td>
                                                <td>{{ $getKrs->kelas }}</td>
                                                <td><button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-default1{{ $getKrs->kodemk }}">Hapus</button></td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mata Kuliah Tersedia Anda :</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mata Kuliah</th>
                                                <th>Kode MK</th>
                                                <th>SKS</th>
                                                <th>SMT</th>
                                                <th>Kelas</th>
                                                <th>Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($krs2 as $getKrs2)
                                            <tr>
                                                <td>{{ $getKrs2->namamk }}</td>
                                                <td>{{ $getKrs2->kodemk }}</td>
                                                <td>{{ $getKrs2->sks }}</td>
                                                <td>{{ $getKrs2->semester }}</td>
                                                <td>{{ $kelas }}</td>
                                                <td><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default{{ $getKrs2->kodemk }}">Pilih</button></td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>

                                <!-- MODAL UNTUK DELETE KRS -->
                                @foreach($krs as $getKrs4)
                                <div class="modal fade" id="modal-default1{{ $getKrs4->kodemk }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/deleteKrs" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Hapus Mata Kuliah {{ $getKrs4->namamk }} pada Kartu Rencana Studi anda? </p>
                                                    <input type="hidden" name="ambilnim" id="ambilnim" value="{{ session('getNim') }}">
                                                    <input type="hidden" name="ambilkodemk" id="ambilkodemk" value="{{ $getKrs4->kodemk }}">
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                        </div>
                                        </form>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                @endforeach

                                <!-- MODAL UNTUK INSERT KRS -->
                                @foreach($krs2 as $getKrs3)
                                <div class="modal fade" id="modal-default{{ $getKrs3->kodemk }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/insertKrs" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Tambahkan Mata Kuliah {{ $getKrs3->namamk }} pada Kartu Rencana Studi anda? </p>
                                                    <input type="hidden" name="ambilnim" id="ambilnim" value="{{ session('getNim') }}">
                                                    <input type="hidden" name="ambilkodemk" id="ambilkodemk" value="{{ $getKrs3->kodemk }}">
                                                    <input type="hidden" name="ambilnamamk" id="ambilnamamk" value="{{ $getKrs3->namamk }}">
                                                    <input type="hidden" name="ambilsks" id="ambilsks" value="{{ $getKrs3->sks }}">
                                                    @foreach($smt as $getSmt)
                                                    <input type="hidden" name="ambiltahun" id="ambiltahun" value="{{ $getSmt->thn }}">
                                                    <input type="hidden" name="ambilsmt" id="ambilsmt" value="{{ $getSmt->smt }}">
                                                    @endforeach
                                                    <input type="hidden" name="ambilkelas" id="ambilkelas" value="{{ $kelas }}">
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                        </div>
                                        </form>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                @endforeach
                                <!-- /.modal -->
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>