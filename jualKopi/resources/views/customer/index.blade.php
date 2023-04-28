@extends('layouts.customer.app',['tittle' => 'Coffee Shop | 100% Kualitas Terbaik'])

@section('content')
<div style="padding-top: 50px;" id="link-produk">
	<div class="bg-secondary py-3 px-3 text-light mt-5" id="product">
		<h1 class="text-center">All Product</h1>
		<div class="container">
			<hr class="bg-light" width="300" style="height: 3px;">
			<hr class="bg-light" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3" style=" box-shadow: 0px 3px 30px black inset;">
		<div class="container">
			<div class="row text-center">
				<?php $no=0; ?>
				@foreach($produk as $data)
				@if($no % 2 == 0)
				<div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 mb-2">
					<a href="{{ route('customer.produk.detail',$data->id_produk) }}" style="color: inherit; text-decoration: none;">
						<div class="card py-2 text-dark" style="background-color: #c9c9cf;" id="product">
							<h5 class="card-title">{{ $data->nama_produk }}</h5>
							<img class="card-img-top" src='{{ asset("img/produk/$data->gambar") }}' alt="Card image cap">
							<div class="card-body">
								<h4>Rp. {{ $data->harga }},-</h4>
							</div>
						</div>
					</a>
				</div>
				@else
				<div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 mb-2">
					<a href="{{ route('customer.produk.detail',$data->id_produk) }}" style="color: inherit; text-decoration: none;">
						<div class="card py-2 text-dark" style="background-color: #eeeeee;" id="product">
							<h5 class="card-title">{{ $data->nama_produk }}</h5>
							<img class="card-img-top" src='{{ asset("img/produk/$data->gambar") }}' alt="Card image cap">
							<div class="card-body">
								<h4>Rp. {{ $data->harga }},-</h4>
							</div>
						</div>
					</a>
				</div>
				@endif
				<?php $no++ ?>
				@endforeach
			</div>

		</div>
	</div>
</div>
<div style="background-color: #DAD2C8;" class="pb-5" id="link-tentang">
	<div class="bg-black-50 py-3 px-3 text-secondary" id="product">
		<h1 class="text-center">Tentang Web</h1>
		<div class="container">
			<hr class="bg-secondary" width="300" style="height: 3px;">
			<hr class="bg-secondary" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3">
		<div class="container">
			<div class="row text-center">

				<div class="col text-center">
					<img src="img/logo.jpg" width="400" align="center" class="rounded-circle">
				</div>
				<div class="col text-justify">
					<p class="my-5">
						<p>Kopi bukan cuma sekedar ngopi, tapi juga tradisi yang sudah melekat dalam kehidupan setiap penikmatnya. Di sini kamu akan menemukan semua informasi mengenai dunia kopi yang menggugah selera orang.</p>
						<p>
						<h5>Visi</h5>
						Visi dari kedai kopi ini adalah menjadi kedai kopi yang menawarkan menu yang bervariatif dengan cita rasa dan kualitas kopi yang baik dan dapat memenuhi selera para pelanggannya sehingga dapat meningkatkan loyalitas pelanggan dan pantas menjadi ikon kuliner di kota Yogyakarta, serta dapat mengembangkan bisnis kedai kopi ini ke berbagai daerah untuk mengenalkan dan membudayakan minum kopi serta membuka lowongan pekerjaan di tengah masyarakat.
						</p>
						<h5>Misi</h5>
						
						<b>A</b>. Mempertahankan cita rasa kopi yang sudah melegenda secara turun-temurun. <br>
						<b>B</b>. Meningkatkan kreativitas untuk menciptakan menu-menu baru yang lebih bervariatif untuk dapat ditawarkan dan dinikmati oleh pelanggan. <br>
						<b>C</b>. Menawarkan kenyamanan di dalam menikmati kopi kepada pelanggan. <br>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
<div class="modal fade" id="registerform" tabindex="-1" role="dialog" aria-labelledby="registerform" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content text-dark" style="background-color: #DAD2C8;">

			<div class="modal-body">
				<div class="text-center my-3">
					<h2 class="mb-3">Register Coffee Shop</h2>
					<img src="{{ asset('img/logo.jpg') }}" width="25%" class="rounded-circle">
				</div>
				<div class="container rounded pt-2">
					<form action="{{ route('register.request') }}" method="POST" enctype="multipart/form-data" autocomplete="off" class="was-validated">
						@csrf
						<div class="form-group">
							<label for="Username">Username</label>
							<input type="text" class="form-control" name="username" maxlength="16" minlength="8" placeholder="Masukkan username" required="">
							<div class="invalid-feedback">
								Username masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input type="password" class="form-control" name="password" maxlength="16" placeholder="Masukkan password" required="">
							<div class="invalid-feedback">
								Password masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Nama">Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" required="">
							<div class="invalid-feedback">
								Nama masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Alamat">Alamat</label>
							<textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan alamat anda" required=""></textarea>
							<div class="invalid-feedback">
								Alamat masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Tanggal Lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tanggal_lahir" required="">
							<div class="invalid-feedback">
								Tanggal Lahir masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="No Telp">No. Telp</label>
							<input type="text" class="form-control" name="no_telp" placeholder="Masukkan nomor telepon anda" required="">
							<div class="invalid-feedback">
								Nomor Telepon masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Jenis Kelamin">Jenis Kelamin</label>
							<select name="jenis_kelamin" required="" class="form-control">
								<option selected="" disabled="" value="">--- Pilih Jenis Kelamin ---</option>
								<option value="laki-laki">Laki - Laki</option>
								<option value="perempuan">Perempuan</option>
							</select>
							<div class="invalid-feedback">
								Belum memilih jenis kelamin!
							</div>
						</div>


						<div class="modal-footer btn-group">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-secondary">{{$submit ?? 'Register'}}</button>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="loginform" tabindex="-1" role="dialog" aria-labelledby="loginform" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content text-dark" style="background-color: #DAD2C8;">

			<div class="modal-body">
				<div class="text-center my-3">
					<h2 class="mb-3">Login Coffee Shop</h2>
					<img src="{{ asset('img/logo.jpg') }}" width="25%" class="rounded-circle">
				</div>
				<div class="container rounded pt-2">
					<form action="{{ route('login.request') }}" method="post" class="">
						{{csrf_field()}}
						<div class="form-group">
							<label for="Username">Username</label>
							<input type="text" class="form-control" name="username" placeholder="Masukkan username" required="">
							<div class="invalid-feedback">
								Username masih kosong!
							</div>
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input type="password" class="form-control" name="password" maxlength="16" placeholder="Masukkan password" required="">
							<div class="invalid-feedback">
								Password masih kosong!
							</div>
						</div>
						<div class="modal-footer btn-group mt-4">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-secondary">{{$submit ?? 'Login'}}</button>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>
</div>
@endsection