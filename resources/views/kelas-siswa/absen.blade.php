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
    <title>IQM - Absen Kelas</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png ') }}">
    <!-- Custom CSS -->
    
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
                        <h4 class="page-title">Absen Kelas Siswa</h4>
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
                {{-- <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Dashboard</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <h6 class="text-white">Charts</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">Widgets</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">Tables</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                                <h6 class="text-white">Full Width</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Forms</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                <h6 class="text-white">Buttons</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                                <h6 class="text-white">Elements</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                                <h6 class="text-white">Calnedar</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                <h6 class="text-white">Errors</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div> --}}
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <canvas id="myChart" style="width:100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <canvas id="myChart2" style="width:100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <canvas id="myChart3" style="width:100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        

                        <div class="card">
                            @if (session('berhasil'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                
                                <p class="mb-0">Data Absensi Siswa Berhasil {{ session('berhasil') }}.</p>
                            </div>
                            @elseif (session('gagal'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Berhasil!</h4>
                                
                                <p class="mb-0">Data Absensi Siswa Berhasil {{ session('gagal') }}.</p>
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
                                        <h5 class="card-title">Absen Kelas Siswa</h5>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="/kelas-siswa/absensi/harian/{{ $kelas['id'] }}" class="btn btn-success btn-sm text-white"><i class="fa fa-check"> </i></a>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Siswa</th>
                                                {{-- <th>Kelas</th> --}}
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td style="width: 10%"> {{ $item['tanggal'] }} </td>
                                                
                                                <td style="width: 50%"> {{$item['siswa'] == null ? 'Siswa Tidak Ditemukan' : $item['siswa']['nama'] }} </td>
                                                {{-- <td> 
                                                    @if($item['siswa'] !== null)
                                                    {{ $item['siswa']['kelas_siswa'] == null ? 'Kelas Tidak Ditemukan' : $item['siswa']['kelas_siswa']['kelas']['nama'] .' - '.$item['siswa']['kelas_siswa']['kelas']['tahun'] }} 
                                                    @else
                                                    Kelas Siswa Tidak Ditemukan
                                                    @endif
                                                </td> --}}
                                                <td style="width: 15%"> 
                                                    @if($item['status'] == 0 ) <span class="badge bg-danger"> Tidak Hadir </span>
                                                    @elseif($item['status'] == 1 ) <span class="badge bg-success">  Hadir </span>
                                                    @elseif($item['status'] == 2 ) <span class="badge bg-cyan" >  Izin </span>
                                                    @elseif($item['status'] == 3 )  <span class="badge bg-warning"> Sakit </span>
                                                    @endif 
                                                </td>
                                                <td style="width: 25%">
                                                    <a href="/absensi/siswa/status/{{ $item['id']}}/{{ $item['tanggal'] }}/1" type="button" class="btn btn-success btn-sm text-white">Hadir</a>
                                                    <a href="/absensi/siswa/status/{{ $item['id']}}/{{ $item['tanggal'] }}/0" type="button" class="btn btn-danger btn-sm text-white" >Tidak Hadir</a>
                                                    <a href="/absensi/siswa/status/{{ $item['id']}}/{{ $item['tanggal'] }}/2" type="button" class="btn btn-cyan btn-sm text-white" >Izin</a>
                                                    <a href="/absensi/siswa/status/{{ $item['id']}}/{{ $item['tanggal'] }}/3" type="button" class="btn btn-warning btn-sm text-white" >Sakit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Siswa</th>
                                                {{-- <th>Kelas</th> --}}
                                                <th>Status</th>
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
   
    
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
     var xValues = ["Hadir", "Tidak Hadir", "Izin", "Sakit"];
     var yValues = ["{{ count($grafik['bulan']['hadir']) }}", "{{ count($grafik['bulan']['tidak']) }}","{{ count($grafik['bulan']['izin']) }}", "{{ count($grafik['bulan']['sakit']) }}"];
     var yValuesAll = ["{{ count($grafik['seluruh']['hadir']) }}", "{{ count($grafik['seluruh']['tidak']) }}","{{ count($grafik['seluruh']['izin']) }}", "{{ count($grafik['seluruh']['sakit']) }}"];
     var barColors = ["green", "red","blue","orange"];
     
     new Chart("myChart", {
       type: "line",
       data: {
         labels: xValues,
         datasets: [{
           backgroundColor: barColors,
           data: yValues
         }]
       },
       options: {
         legend: {display: false},
         title: {
           display: true,
           text: "Absensi Bulan Ini"
         }
       }
     });

     new Chart("myChart2", {
       type: "line",
       data: {
         labels: xValues,
         datasets: [{
           backgroundColor: barColors,
           data: yValues
         }]
       },
       options: {
         legend: {display: false},
         title: {
           display: true,
           text: "Absensi Triwulan Ini"
         }
       }
     });

     new Chart("myChart3", {
       type: "line",
       data: {
         labels: xValues,
         datasets: [{
           backgroundColor: barColors,
           data: yValuesAll
         }]
       },
       options: {
         legend: {display: false},
         title: {
           display: true,
           text: "Absensi Keseluruhan"
         }
       }
     });
     </script>

</body>

</html>