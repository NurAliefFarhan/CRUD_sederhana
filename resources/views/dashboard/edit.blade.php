<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CRUD PEGAWAI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg nav-link-user">
                            <img alt="image" src="{{asset('assets/img/avatar/Tanjiro.jpeg')}}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div> --}}
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">PEGAWAI</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">p</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Pegawai</li>
                        <li class="dropdown active">
                            <a href="#" class="nav-link"><i class="fa-solid fa-table"></i>
                                <span>Table Data</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Form</h1>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Form Edit Data Pegawai</h2>
                        <p class="section-lead">
                            Ini adalah form data pegawai dan anda bisa memasukkan pegawai baru.
                        </p>

                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Form Pegawai</h4>
                                    </div>
                                    <form action="{{route('update', $pegawais['id'])}}" method="POST">
                                        @csrf 
                                        @method('PATCH')

                                        @if ($errors->any())
                                            {{-- alert kalau tidak di isi, akan muncul alert denger  --}}
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif



                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Nama</label>
                                                    <input type="string" name="nama" value="{{$pegawais['nama']}}" class="form-control" id="inputEmail4" placeholder="Masukkan Nama Anda">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState">Divisi</label>
                                                    <select id="inputState" name="divisi" class="form-control">
                                                        <option hidden value="{{$pegawais['divisi']}}">{{$pegawais['divisi']}}</option>
                                                        {{-- <option hidden>-- Pilih Jenis Divisi --</option> --}}
                                                        <option value="staff">staff</option>
                                                        <option value="guru">guru</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Umur</label>
                                                    <input type="number" name="umur" value="{{$pegawais['umur']}}" class="form-control" id="inputEmail4" placeholder="Masukkan Umur Anda">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState">Jenis Kelamin</label>
                                                    <select id="inputState" name="jk" class="form-control">
                                                        <option hidden value="{{$pegawais['jk']}}">{{$pegawais['jk']}}</option>
                                                        {{-- <option hidden>-- Pilih Jenis Kelamin --</option> --}}
                                                        <option value="laki-laki">laki-laki</option>
                                                        <option value="perempuan">perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-success" style="width:10%;">Submit</button>
                                            <a href="/" class="btn btn-primary" style="width:10%; text-align:center; margin-left:5%;">Back</a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>
