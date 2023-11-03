<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>IQM - Pemasukkan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png ') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/flot/css/float-chart.css ') }}"  rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"  rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css ') }}"  rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    @include('logo')
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                @include('navbar-collapse')
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('aside')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Pemasukkan</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                {{-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol> --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-3 mb-2">
                        <div class="bg-dark p-10 text-white text-center">
                            <i class="fa fa-dollar-sign mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">2540</h5>
                            <small class="font-light">Total Bulan Lalu</small>
                        </div>
                    </div>
                    <div class="col-3 mb-2">
                        <div class="bg-dark p-10 text-white text-center">
                            <i class="fa fa-dollar-sign mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">120</h5>
                            <small class="font-light">Total Bulan Ini</small>
                        </div>
                    </div>
                    <div class="col-3 mb-2">
                        <div class="bg-dark p-10 text-white text-center">
                            <i class="fa fa-dollar-sign mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">656</h5>
                            <small class="font-light">Total Keseluruhan</small>
                        </div>
                    </div>
                    <div class="col-3 mb-2">
                        <div class="bg-dark p-10 text-white text-center">
                            <i class="fa fa-dollar-sign mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">656</h5>
                            <small class="font-light">Saldo Akhir</small>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        
                        <div class="card">
                            @if (session('berhasil'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                
                                <p class="mb-0">Data Pemasukkan Berhasil {{ session('berhasil') }}.</p>
                            </div>
                            @elseif (session('gagal'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Gagal!</h4>
                                
                                <p class="mb-0">Data Pemasukkan Gagal {{ session('gagal') }}.</p>
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Error!</h4>
                                
                                <p class="mb-0">{{ session('error') }}.</p>
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-lg-11">
                                        <h5 class="card-title">Data Pemasukkan</h5>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="/pemasukkan/tambah" class="btn btn-success btn-sm text-white"><i class="fa fa-plus"> </i></a>
                                    </div>
                                </div>
                                <div class="row ml-3">
                                    <div class="col-md-1">
                                        <h6 class="mt-2 ">Filter Data : </h6>
                                        
                                    </div>
                                    <div class="col-md-1 text-end mt-2">
                                        <label class="">Awal</label>
                                    </div>
                                    <div class="col-md-2 ">
                                        
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tgl-awal"
                                                placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-end mt-2">
                                        <label class="">Akhir</label>
                                    </div>
                                    <div class="col-md-2 ">
                                        
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tgl-akhir"
                                                placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button class="btn btn-outline-info"><i class="mdi mdi-search"></i> Cari</button>
                                        <button class="btn btn-outline-success"  onclick="exportExcel()"><i class="mdi mdi-search"></i> Excel</button>
                                        <button class="btn btn-outline-danger"><i class="mdi mdi-search"></i> PDF</button>
                                    </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal </th>
                                                <th>Pemasukkan</th>
                                                <th>Nominal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td> {{ $item['tanggal'] }} </td>
                                                <td> {{ $item['nama']}} </td>
                                                <td> {{ number_format($item['nominal'])  }} </td>
                                                <td>
                                                    <a href="/pemasukkan/edit/{{ $item['id']}}" type="button" class="btn btn-cyan btn-sm text-white">Edit</a>
                                                    <a href="/pemasukkan/hapus/{{ $item['id'] }}" type="button" class="btn btn-danger btn-sm text-white" onclick=" return confirm('Yakin Menghapus Data?')">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal </th>
                                                <th>Pemasukkan</th>
                                                <th>Nominal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
   @include('jquery')
   <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
   <script src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        jQuery('.mydatepicker').datepicker();
        jQuery('#tgl-awal').datepicker({
            autoclose: true,
            todayHighlight: true,
            format:"dd/mm/yyyy"
        });
        jQuery('#tgl-akhir').datepicker({
            autoclose: true,
            todayHighlight: true,
            format:"dd/mm/yyyy"
        });

        function filter() {
            console.log('filter')
        }
        function exportExcel() {
            console.log('excel')
            window.open('/pemasukkan/export')
        }
        function exportPdf() {
            
        }
    </script>

</body>

</html>