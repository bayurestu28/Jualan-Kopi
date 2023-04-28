@extends('layouts.admin.app', ['title' => 'Kurir | Coffee Shop'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kurir</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Kurir</li>
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
              <h3 class="card-title my-2">Kurir</h3>
              <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#insertKurir">
                <li class="fas fa-plus"></li></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="3%">#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telp</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th width="11%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th width="3%">#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telp</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th width="11%">Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no=1 ?>
                      @foreach($kurir as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        @if($data->status_kurir == 'Ready')
                        <td class="bg-success">{{ $data->status_kurir }}</td>
                        @else
                        <td class="bg-danger">{{ $data->status_kurir }}</td>
                        @endif
                        <td class="text-center">
                          <a href="{{ route('admin.kurir.edit',$data->id) }}" class="btn btn-warning" title="Edit"><li class="fas fa-pencil-alt"></li></a>
                          <a href="{{ route('admin.kurir.hapus',$data->id) }}" class="btn btn-danger" title="Hapus"><li class="fas fa-trash"></li></a>
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


<div class="modal fade" id="insertKurir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog-scrollable modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #DAD2C8;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kurir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.kurir.tambah') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
              placeholder="Username" value="">

              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="password">Password</label>
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
              placeholder="Nama" value="">

              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="Alamat">Alamat</label>
              <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
              placeholder="Alamat"></textarea>

              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
              placeholder="Tanggal Lahir">
              @error('tanggal_lahir')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="no_telp">No. Telephon</label>
              <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
              placeholder="Nomor Telephon" min="9999999999" max="999999999999" value="">

              <div class="invalid-feedback">
                Nomor Telepon harus 12 angka, masih kosong!
              </div>

              @error('no_telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                <option value="" disabled="" selected="">--- Pilih Jenis Kelamin ---</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>

              @error('jenis_kelamin')
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