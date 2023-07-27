<!DOCTYPE html>
<html lang="en" style="min-height:100%;background-color:#f4f4f4">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - Aplikasi Pencatatan Pengeluaran dan Pemasukan Keuangan Berbasis Web</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body style="background-color:#f4f4f4">
        <div class="top-bar">            
            <div class="btn-burger burger dib pointer"><i class="fas fa-bars"></i></div>
            <a href="#" class="brands">Aplikasi Pencatatan Pengeluaran dan Pemasukan Keuangan Berbasis Web</a>
            <div class="clear"></div>
        </div>
        <div class="admin-menu">
            <ul class="list-unstyled">
                <li id="home">
                    <a href="{{ route('home') }}" class="admin-menu-first" data-id="#home">
                        <i class="fa fa-tachometer-alt fa-fw"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li id="kategori">
                    <a class="admin-menu-first" data-id="#kategori">
                        <i class="fa fa-sitemap fa-fw" aria-hidden="true"></i>
                        <span>Kategori</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('kategori') }}">List Kategori</a></li>
                        <li><a href="{{ route('tambah_kategori') }}">Tambah Kategori</a></li>
                    </ul>
                </li>
                <li id="transaksi">
                    <a class="admin-menu-first" data-id="#transaksi">
                        <i class="fa fa-list fa-fw" aria-hidden="true"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('transaksi') }}">List Transaksi</a></li>
                        <li><a href="{{ route('tambah_transaksi') }}">Tambah Transaksi</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="data" data-id="#@yield('menu')"></div>
        <div class="contents">@yield('content')</div>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                var add = '@yield("add_btn")';
                $('#myTable_wrapper').prepend(add);

                @yield('jscp')
                
            });
        </script>
    </body>
</html>