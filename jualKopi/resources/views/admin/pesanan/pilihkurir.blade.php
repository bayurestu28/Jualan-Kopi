@extends('layouts.admin.app', ['title' => 'Pilih Kurir | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pilih Kurir</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
            <li class="breadcrumb-item active">Pesanan Masuk</li>
            <li class="breadcrumb-item active">Pilih Kurir</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>
                <ul>
                  <li>Pemesan : {{ $transaksi->first()->pemesan }}</li>
                  <li>Alamat : {{ $transaksi->first()->alamat_pemesan }}</li>
                  <li>No. HP : {{ $transaksi->first()->nohp_pemesan }}</li>
                  <li>Pesanan :
                    <h5>
                      <ol>
                        @foreach($transaksi as $data)
                        <li>{{ $data->nama_produk}} x {{$data->jumlah}} </li>
                        @endforeach
                      </ol>
                    </h5>
                  </li>
                </ul>
              </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-12 row">
                @foreach($kurir as $datakurir)
                <div class="col-sm-6 col-md-6 col-lg-3 card">
                  <div class="card-header text-center">
                    <h3><i class="fas fa-user-circle fa-lg"></i>
                    </h3>
                    <p>
                      {{ $datakurir->nama }}
                    </p>
                  </div>
                  <div class="card-body">
                    <b>Tanggal Lahir</b>
                    <i class="float-right"> {{ $datakurir->tanggal_lahir }}</i>
                    <br>
                    <b>No Telp</b>
                    <i class="float-right"> {{ $datakurir->no_telp }}</i>
                    <br>
                    <b>Jenis Kelamin</b>
                    <i class="float-right"> {{ $datakurir->jenis_kelamin }}</i>
                    <br>
                  </div>
                  <hr>
                  <div class="card-footer">
                    @if($datakurir->status_kurir == 'Ready')
                    <b href="#" class="btn btn-success float-left">
                      {{ $datakurir->status_kurir }}
                    </b>
                    <a href="{{ route('admin.transaksi.pesanan.teruskan',
                    [$transaksi->first()->id_transaksi,$datakurir->id]) }}" class="btn btn-secondary float-right">
                      <i class="fas fa-shipping-fast"></i> Pilih Kurir
                    </a>
                    @else
                    <b href="#" class="btn btn-danger float-left">
                      {{ $datakurir->status_kurir }}
                    </b>
                    <a href="" class="btn btn-secondary disabled float-right">
                      <i class="fas fa-shipping-fast"></i> Pilih Kurir
                    </a>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <!-- /.card-body -->
          </div>
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
<!-- /.content -->
</div>
@endsection