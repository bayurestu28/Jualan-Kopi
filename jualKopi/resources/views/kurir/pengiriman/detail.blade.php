@extends('layouts.kurir.app', ['title' => 'Detail Pengiriman | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Pengiriman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('kurir.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Pengiriman</li>
            <li class="breadcrumb-item active">Detail</li>
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
                </ul>
              </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="3%">#</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th width="3%"></th>
                    <th></th>
                    <th class="bg-info"><i class="fas fa-coins"></i> Sub Total</th>
                    <th class="bg-info">Rp. 
                      <?php $total=0; ?>
                      @foreach($transaksi as $subtotal)
                        <?php $total = $total + ($subtotal->harga*$subtotal->jumlah); ?>
                      @endforeach
                      <?php echo $total; ?> + 10000<hr>Total : Rp. <?php echo $total+10000; ?>
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $no=1 ?>
                  @foreach($transaksi as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->harga }}</td>
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