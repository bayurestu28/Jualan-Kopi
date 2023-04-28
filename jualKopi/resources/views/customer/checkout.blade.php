@extends('layouts.customer.app',['tittle' => 'Coffee Shop | 100% Kualitas Terbaik'])

@section('content')
<div style="background-color: #DAD2C8; margin-top: 100px;" class="pb-5">
	<div class="bg-black-50 py-3 px-3 text-light bg-secondary" id="product">
		<h1 class="text-center">Checkout</h1>
		<div class="container">
			<hr class="bg-light" width="300" style="height: 3px;">
			<hr class="bg-light" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6 mb-3">
					<div class="card">
						<div class="card-header bg-secondary text-light">
							<h3>Pesanan</h3>
						</div>
						<div class="card-body">
							<?php $subtotal=0; ?>
							@if($transaksi->count()==0)
							<div class="container border-top border-bottom row">
								<div class="col-12 text-center">
									<h3>Tidak ada barang</h3>
								</div>
							</div>
							@else
							@foreach($transaksi as $data)
							<div class="container border-top border-bottom row">
								<div class="col-sm-2 col-md-2 col-lg-2">
									<img src='{{ asset("img/produk/$data->gambar") }}' width="50px">
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<b>{{ $data->nama_produk }}</b>
									<b>x{{ $data->jumlah }}</b>
									<hr>
								</div>
								<div class="col-sm-4 col-md-4 col-lg-4 text-center">
									<b class="container">Rp. {{ $data->jumlah * $data->harga }},-</b>
									<?php $subtotal = $subtotal + ($data->jumlah * $data->harga) ?>
									<hr>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						<div class="row container">
							@if($transaksi->count()==0)
							@else
							<div class="col-sm-5 col-md-5 col-lg-5">
							</div>
							<div class="col-sm-3 col-md-3 col-lg-3">
								<b>Subtotal </b>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4">
								<b class="float-right text-dark">Rp. {{ $subtotal }},-</b>
							</div>
							@endif
						</div>
						<div class="row container">
							@if($transaksi->count()==0)
							@else
							<div class="col-sm-5 col-md-6 col-lg-5">
							</div>
							<div class="col-sm-3 col-md-3 col-lg-3">
								<b>Biaya Kirim </b>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4">
								<b class="float-right text-danger">Rp. 10000,-</b>
							</div>
							@endif
						</div>
						<hr>
						<div class="mb-3 row container">
							@if($transaksi->count()==0)
							@else
							<div class="col-sm-5 col-md-5 col-lg-5">
							</div>
							<div class="col-sm-3 col-md-3 col-lg-3">
								<b>Total </b>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4">
								<?php $total=$subtotal+10000; ?>
								<b class="float-right text-success">Rp. {{ $total }},-</b>
							</div>
							@endif
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header bg-secondary text-light">
							<h3>Informasi Pelanggan</h3>
						</div>
						<div class="card-body">
							<span><b>Alamat Pengiriman</b></span>
							<div class="form-group mt-2">
								<form method="post" action="{{ route('customer.checkout.confirm',$transaksi->first()->id_transaksi) }}" enctype="multipart/form-data">
									@csrf
									<input type="" name="biaya" value="{{ $total }}" hidden="">
									<div class="form-group row">
										<label class="col-4">Pemesan</label>
										<input type="text" name="pemesan" class="form-control @error('pemesan') is-invalid @enderror col-8"
										placeholder="Pemesan" value="{{ Auth::user()->nama }}">

										@error('pemesan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									<div class="form-group row">
										<label class="col-4">No. Telp Pemesan</label>
										<input type="number" min="0" name="nohp_pemesan" class="form-control @error('nohp_pemesan') is-invalid @enderror col-8"
										placeholder="No. Telp Pemesan" value="{{ Auth::user()->no_telp }}">

										@error('nohp_pemesan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									<div class="form-group row">
										<label class="col-4">Alamat Pemesan</label>
										<textarea name="alamat_pemesan" class="form-control @error('alamat_pemesan') is-invalid @enderror col-8" placeholder="Alamat Pemesan">{{ Auth::user()->alamat }}</textarea>

										@error('alamat_pemesan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									<span><b>Jenis Pengiriman</b></span>
									<div class="text-dark">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="jenis_pengiriman" id="exampleRadios1" value="JNE" checked>
											<label class="form-check-label" for="exampleRadios1">
												JNE
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="jenis_pengiriman" id="exampleRadios2" value="J&E">
											<label class="form-check-label" for="exampleRadios2">
												J&T
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="jenis_pengiriman" id="exampleRadios3" value="SiiCepat">
											<label class="form-check-label" for="exampleRadios3">
												SiiCepat
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="jenis_pengiriman" id="exampleRadios4" value="COD">
											<label class="form-check-label" for="exampleRadios4">
												COD
											</label>
										</div>
										<br>
										<div class="text-muted text-left" style="font-size:12px;">
											<p>*)Pengiriman menggunakan jenis pengiriman COD <B>hanya</B> berlaku untuk pengiriman daerah jogja saja</p>
										</div>
									</div>

									<div class="form-group mt-3">
										<div class="text-muted text-center" style="font-size:14px; ">
											<p>
											Gunakan ATM / iBanking / mBanking / Setor Tunai <br>
											untuk transfer ke rekening Coffee Shop berikut ini :
											</p>
										</div>
										<div class="border border-danger" style="background-color: lightgrey;">
											<div class="container my-2">
												<img src="{{ asset('img/mandiri.jpg') }}" width="20%">
												<p class="" style="font-size: 14px;">
													<b>
														No Rekening : 112001000159301 <br>
														Cabang : Yogyakarta <br>
														No Rekening : Coffee Shop <br>
													</b>
												</p>
											</div>
										</div>
										<br>
										<div class="text-muted text-left" style="font-size:12px; ">
											<p  style="color: red">**) Selanjutnya kirimkan bukti transfer ke No. WA 085268553848 beserta nama pemesan</p>
										</div>
									</div>

									<div class="form-group mt-3">
										<button type="submit" class="btn btn-secondary container py-3">Checkout Pesanan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection