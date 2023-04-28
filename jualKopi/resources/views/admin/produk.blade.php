@extends('layouts.admin.app', ['title' => 'Produk | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
            <li class="breadcrumb-item active">Kopi</li>
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
              <h3 class="card-title my-2">Produk Kopi</h3>
              <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#insertProduk">
                <li class="fas fa-plus"></li></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="3%">#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th width="5%">Gambar</th>
                        <th width="11%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no=1 ?>
                      @foreach($produk as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_produk }}</td>
                        <td>{{ $data->stok }}</td>
                        <td>{{ $data->harga }}</td>
                        <td class="text-center">
                          <a href='{{ asset("img/produk/$data->gambar") }}' class="btn btn-secondary" title="Lihat Gambar" data-toggle="lightbox" data-title="{{ $data->nama_produk }}"><li class="fas fa-image"></li></a>
                        </td>
                        <td class="text-center">
                          <a href="{{ route('admin.produk.edit',$data->id_produk) }}" class="btn btn-warning" title="Edit"><li class="fas fa-pencil-alt"></li></a>
                          <a href="{{ route('admin.produk.hapus',$data->id_produk) }}" class="btn btn-danger" title="Hapus"><li class="fas fa-trash"></li></a>
                        </td>
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


<div class="modal fade" id="insertProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog-scrollable modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #DAD2C8;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.produk.tambah') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
              placeholder="Nama Produk" value="">

              @error('nama_produk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="stok">Stok</label>
              <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
              placeholder="Stok" value="" maxlength="11" min="0">
              @error('stok')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="Harga">Harga</label>
              <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
              placeholder="Harga" value="" maxlength="11" min="0">
              @error('harga')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="Gambar">Gambar</label>
              <input type="file" accept="image/*" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
              @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">{{$submit ?? 'Buat Data'}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection