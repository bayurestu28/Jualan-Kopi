@extends('layouts.customer.app',['tittle' => 'Coffee Shop | 100% Kualitas Terbaik'])

@section('content')
<div style="background-color: #DAD2C8; margin-top: 100px;" class="pb-5" id="link-tentang">
	<div class="bg-black-50 py-3 px-3 text-light bg-secondary" id="product">
		<h1 class="text-center">My Profile</h1>
		<div class="container">
			<hr class="bg-light" width="300" style="height: 3px;">
			<hr class="bg-light" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4 mb-3">
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center"><h1>
								<i class="fas fa-user-circle fa-lg"></i>
							</h1>
						</div>

						<h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>

						<p class="text-muted text-center">CUSTOMER COFFEE SHOP</p>

						<ul class="list-group list-group-unbordered mb-3">
							<li class="list-group-item">
								<b>Username</b> <i class="float-right">{{ Auth::user()->username }}</i>
							</li>
							<li class="list-group-item">
								<b>Tanggal Lahir</b>
								<i class="float-right">
									{{ Auth::user()->tanggal_lahir }}
								</i>
							</li>
							<li class="list-group-item">
								<b>Jenis Kelamin</b> <i class="float-right">{{ Auth::user()->jenis_kelamin }}</i>
							</li>
							<li class="list-group-item">
								<b>No. Telp</b> <i class="float-right">{{ Auth::user()->no_telp }}</i>
							</li>
							<li class="list-group-item">
								<b>Alamat</b> <p class="">{{ Auth::user()->alamat }}</p>
							</li>
						</ul>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-8">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h5> <i class="fas fa-edit"></i> Edit Profile</h5>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="settings">
								<form class="form-horizontal text-justify" method="post" action="{{ route('customer.myprofile.update',Auth::user()->id) }}" enctype="multipart/form-data" autocomplete="off">
									@csrf
									<div class="form-group row">
										<label for="inputName" class="col-sm-3 col-form-label">Username</label>
										<div class="col-sm-9">
											<input type="text" name="username" class="form-control" id="inputName" placeholder="Username" value="{{ Auth::user()->username }}" required="" >
										</div>
									</div>
									<div class="form-group row">
										<label for="inputName2" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-9">
											<input type="text" name="nama" class="form-control" id="inputName2" placeholder="Nama" value="{{ Auth::user()->nama }}" required="" >
										</div>
									</div>
									<div class="form-group row">
										<label for="inputTanggal" class="col-sm-3 col-form-label">Tanggal Lahir</label>
										<div class="col-sm-9">
											<input type="date" name="tanggal_lahir" class="form-control" id="inputTanggal" placeholder="" value="{{ Auth::user()->tanggal_lahir }}" required="">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputJk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="col-sm-9">
											<select name="jenis_kelamin" class="form-control" id="inputJk">
												<option value="" disabled="">--- Pilih Jenis Kelamin ---</option>
												@if(Auth::user()->jenis_kelamin == 'laki-laki')
												<option value="laki-laki" selected="">Laki-laki</option>
												<option value="perempuan">Perempuan</option>
												@elseif(Auth::user()->jenis_kelamin == 'perempuan')
												<option value="laki-laki">Laki-laki</option>
												<option value="perempuan" selected="">Perempuan</option>
												@endif
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="inputNotlp" class="col-sm-3 col-form-label">No. Telp</label>
										<div class="col-sm-9">
											<input type="number" name="no_telp" class="form-control" id="inputNotlp" placeholder="Nomor telephone" min="9999999999" max="999999999999" value="{{ Auth::user()->no_telp }}" required="">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
										<div class="col-sm-9">
											<textarea class="form-control" name="alamat" id="inputExperience" placeholder="Alamat" required="">{{ Auth::user()->alamat }}</textarea>
										</div>
									</div>
									<hr class="mt-5">
									<span class="text-danger text-sm">Biarkan kosong jika tidak ingin merubah password!</span>
									<div class="form-group row my-3">
										<label for="inputpasslama" class="col-sm-3 col-form-label">Password Lama</label>
										<div class="col-sm-9">
											<input type="password" name="passwordlama" class="form-control" id="inputpasslama" placeholder="Password Lama" value="">
										</div>
									</div>
									<div class="form-group row my-3">
										<label for="inputpassbaru" class="col-sm-3 col-form-label">Password Baru</label>
										<div class="col-sm-9">
											<input type="password" name="passwordbaru" class="form-control" id="inputpassbaru" placeholder="Password Baru" value="">
										</div>
									</div>
									<div class="form-group row text-right">
										<div class="offset-sm-3 col-sm-9">
											<button type="submit" class="btn btn-warning">Update Profile</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
			</div>

		</div>
	</div>
</div>
</div>
@endsection