@extends('layouts.admin.app', ['title' => 'Edit Produk | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Akun Kurir <b class="text-warning">{{$kurir->username}}</b></h1>
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
          <h5 class="m-0 font-weight-bold text-primary">Form Edit Akun Kurir
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.kurir.update',$kurir->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                  placeholder="Username" value="{{ $kurir->username }}">

                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="password">Password</label>
                  <span class="text-danger text-sm">Kosongkan jika tidak ingin mengubah password!</span>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                  placeholder="Password" value="">

                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                  placeholder="Nama" value="{{ $kurir->nama }}">

                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="Alamat">Alamat</label>
                  <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                  placeholder="Alamat">{{ $kurir->alamat }}</textarea>

                  @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                  placeholder="Tanggal Lahir" value="{{ $kurir->tanggal_lahir }}">
                  @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="no_telp">No. Telephon</label>
                  <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                  placeholder="Nomor Telephon" min="9999999999" max="999999999999" value="{{ $kurir->no_telp }}">

                  @error('no_telp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="" disabled="">--- Pilih Jenis Kelamin ---</option>
                    @if($kurir->jenis_kelamin == 'laki-laki')
                    <option value="laki-laki" selected="">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                    @elseif($kurir->jenis_kelamin == 'perempuan')
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan" selected="">Perempuan</option>
                    @endif
                  </select>

                  @error('jenis_kelamin')
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