@extends('layouts.admin.app', ['title' => 'Edit Produk | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Produk <b class="text-warning">{{$produk->nama_produk}}</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Edit Paket
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.produk.update',$produk->id_produk) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <label for="nama_produk">Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror"
                      placeholder="Nama Produk" value="{{ $produk->nama_produk }}">

                      @error('nama_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-12">
                  <label for="stok">Stok</label>
                  <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                  placeholder="Stok" value="{{ $produk->stok }}" maxlength="11" min="0">
                  @error('stok')
                  <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-12">
              <label for="Harga">Harga</label>
              <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
              placeholder="Harga" value="{{ $produk->harga }}" maxlength="11" min="0">
              @error('harga')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-12">
          <label for="Gambar">Gambar</label>
          <span class="text-danger text-sm"> Biarkan kosong untuk tidak mengubah gambar produk!</span>
          <input type="file" accept="image/*" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ $produk->gambar }}">
          @error('gambar')
          <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-primary">{{$submit ?? 'Update Data'}}</button>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>

</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection