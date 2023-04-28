@extends('layouts.admin.app', ['title' => 'Laporan Penjualan | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Laporan Penjualan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
            <li class="breadcrumb-item active">Laporan</li>
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
              <h3 class="card-title my-2">Laporan Penjualan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="3%">#</th>
                      <th>ID</th>
                      <th>Customer</th>
                      <th>Kurir</th>
                      <th>Biaya</th>
                      <th>Waktu Transaksi</th>
                      <th>Pemesan</th>
                      <th>No. Telp</th>
                      <th>Alamat</th>
                      <th>Jenis Pengiriman</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="3%">#</th>
                      <th>ID</th>
                      <th>Customer</th>
                      <th>Kurir</th>
                      <th>Biaya</th>
                      <th>Waktu Transaksi</th>
                      <th>Pemesan</th>
                      <th>No. Telp</th>
                      <th>Alamat</th>
                      <th>Jenis Pengiriman</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1 ?>
                    @foreach($transaksi as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->id_transaksi }}</td>
                      <td>{{ $data->usercustomer }}</td>
                      <td>{{ $data->userkurir }}</td>
                      <td>{{ $data->biaya }}</td>
                      <td>{{ $data->waktu_transaksi }}</td>
                      <td>{{ $data->pemesan }}</td>
                      <td>{{ $data->nohp_pemesan }}</td>
                      <td>{{ $data->alamat_pemesan }}</td>
                      <td>{{ $data->jenis_pengiriman }}</td>
                      @if($data->status_transaksi == 'Uncheckout')
                      <td class="bg-secondary">{{ $data->status_transaksi }}</td>
                      @elseif($data->status_transaksi == 'Checkout')
                      <td class="bg-warning">{{ $data->status_transaksi }}</td>
                      @elseif($data->status_transaksi == 'Lunas')
                      <td class="bg-success">{{ $data->status_transaksi }}</td>
                      @elseif($data->status_transaksi == 'Dikirim')
                      <td class="bg-primary">{{ $data->status_transaksi }}</td>
                      @else
                      <td class="bg-info">{{ $data->status_transaksi }}</td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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