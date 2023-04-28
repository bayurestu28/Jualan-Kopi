@extends('layouts.kurir.app', ['title' => 'Pengiriman | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lihat Pesanan yang Harus Dikirim</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('kurir.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Pengiriman</li>
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
              <h3 class="card-title my-2">Data Pesanan yang Harus Dikirim</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="3%">#</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1 ?>
                  @foreach($transaksi as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="ID Transaksi" class="col-3 col-form-label">ID Transaksi</label>
                          <div class="col-3">
                            <input type="number" name="" class="form-control" readonly="" value="{{ $data->id_transaksi }}">
                          </div>
                          <label for="ID Transaksi" class="col-3 col-form-label">Status</label>
                          <div class="col-3">
                            @if($data->status_transaksi == 'Uncheckout')
                              <input type="text" name="" class="form-control bg-secondary" readonly="" value="{{ $data->status_transaksi }}">
                            @elseif($data->status_transaksi == 'Checkout')
                              <input type="text" name="" class="form-control bg-warning" readonly="" value="{{ $data->status_transaksi }}">
                            @elseif($data->status_transaksi == 'Lunas')
                              <input type="text" name="" class="form-control bg-success" readonly="" value="{{ $data->status_transaksi }}">
                            @elseif($data->status_transaksi == 'Dikirim')
                              <input type="text" name="" class="form-control bg-primary" readonly="" value="{{ $data->status_transaksi }}">
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="Pemesan" class="col-3 col-form-label">Pemesan</label>
                          <div class="col-9">
                            <input type="text" name="" class="form-control" readonly="" value="{{ $data->pemesan }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <div class="form-group row">
                          <div class="col-12 text-center">
                            <a href="{{ route('kurir.pengiriman.detail',$data->id_transaksi) }}" class="btn btn-warning col-5 float-left"><li class="fas fa-info-circle"></li> Lihat Detail</a>

                            <a href="{{ route('kurir.pengiriman.konfirmasi',$data->id_transaksi) }}" class="btn btn-success col-5 float-right"><li class="fas fa-check-circle"></li> Konfirmasi Terkirim</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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