<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('style/fontawesome/css/all.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}">
    <style type="text/css">
        html {
            scroll-behavior: smooth;
        }
        #product:hover img{
            opacity: 0.7;
            transition: .5s ease;
        }
        #product:hover h1{
            opacity: 0.7;
            transition: .5s ease;
        }
        #:hover{
            animation-delay: .5s;
        }
    </style>
    <title>{{ $tittle }}</title>
</head>
<body style="background-image: url('img/bg.jpg'); background-size: 100%; background-attachment: fixed;">
    <div class="">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('customer.index') }}">
                    <img src="{{ asset('img/logo.jpg') }}" width="100" class="rounded-circle">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <div>
                        <ul class="navbar-nav mr-auto btn">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('customer.index') }}#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.index') }}#link-produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.index') }}#link-tentang">Tentang Web</a>
                            </li>
                            <li class="border-right border-bottom mx-2"></li>
                            @guest
                            <li class="nav-item">
                                <buttom class="nav-link" data-toggle="modal" data-target="#registerform"><i class="fas fa-address-card"></i> Register</button>
                                </li>
                                <li class="navbar-nav">
                                    <buttom class="nav-link" data-toggle="modal" data-target="#loginform"><i class="fas fa-sign-in-alt"></i> Log-in</button>
                                    </li>
                            @endguest
                            @auth
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user"></i> {{ Auth::user()->username }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown" style="background-color: #DAD2C8;">
                                        <h1><i class="fas fa-user-circle"></i></h1>
                                        <i>{{ Auth::user()->nama }}</i>
                                        <hr class="bg-light" style="height: 1px;">
                                        <div class="mt-3 px-2 text-left">
                                        <a class="dropdown-item" href="{{ route('customer.myprofile') }}"><i class="fas fa-id-card"></i> Profile</a>
                                        <a class="dropdown-item" href="{{ route('customer.riwayat') }}"><i class="fas fa-tasks"></i> Riwayat Transaksi</a>
                                        <a class="dropdown-item" href="{{ route('customer.cart') }}"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Log-out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

    <footer class="bg-dark text-secondary">
        <div class="container py-4 text-center">
            <div>
                <h3>Contact Us:</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                    <h4><i class="fab fa-twitter"></i> @coffeeshop</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                    <h4><i class="fab fa-facebook"></i> Coffee Shop</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                    <h4><i class="fas fa-envelope"></i> coffees@gmail.com</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9 col-xs-12">
                    <h4><i class="fas fa-phone-alt"></i> 085-000-xxx-xxx</h4>
                </div>
            </div>
        </div>

        <hr class="bg-secondary" width="50%" style="height: 1px;">
        <div class="text-center py-3">
            <strong>Copyright &copy; 2020 <a href="#">Coffee Shop</a>.</strong>
        </div>
    </footer>

    @yield('footer')
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Toasr -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
})

 $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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

  @if(Session::has('sukses'))
  Toast.fire({
    icon: 'success',
    title: "{{Session::get('sukses')}}"
})
  @endif
  @if(Session::has('gagal'))
  Toast.fire({
    icon: 'error',
    title: "{{Session::get('gagal')}}"
})
  @endif
    // LogOut
    @if(Session::has('logout'))
    Toast.fire({
      icon: 'success',
      title: "{{Session::get('logout')}}"
  })
    @endif
</script>
</html>