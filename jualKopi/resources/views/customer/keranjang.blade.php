@extends('layouts.customer.app',['tittle' => 'Coffee Shop | 100% Kualitas Terbaik'])

@section('content')
<div style="background-color: #DAD2C8; margin-top: 100px;" class="pb-5">
	<div class="bg-black-50 py-3 px-3 text-light bg-secondary" id="product">
		<h1 class="text-center">Keranjang Belanjaan</h1>
		<div class="container">
			<hr class="bg-light" width="300" style="height: 3px;">
			<hr class="bg-light" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h2>My Cart</h2>
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
									<img src='{{ asset("img/produk/$data->gambar") }}' width="100%">
								</div>
								<div class="col-sm-6 col-md-6 col-lg-6">
									<b>{{ $data->nama_produk }}</b>
									<hr>
									<form action="{{ route('customer.cart.tambahjumlah',$data->id_detil) }}" method="post">
										<span class="mr-2">Jumlah </span>
										@csrf
										<input type="number" min="1" max="{{ $data->stok }}" name="jumlah" value="{{ $data->jumlah }}" class="rounded">
										<button type="submit" class="bg-info text-light px-2 rounded"><i class="fas fa-save"></i></button>
									</form>
								</div>
								<div class="col-sm-3 col-md-3 col-lg-3 text-center">
									<h3 class="my-5 container">Rp. {{ $data->jumlah * $data->harga }},-</h3>
									<?php $subtotal = $subtotal + ($data->jumlah * $data->harga) ?>
								</div>
								<div class="col-sm-1 col-md-1 col-lg-1 text-center">
									<a href="{{ route('customer.cart.hapus',$data->id_detil) }}" class="btn btn-danger my-5"><i class="fas fa-trash"></i></a>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						<div class="mb-3 row container">
							@if($transaksi->count()==0)
							@else
							<div class="col-sm-6 col-md-7 col-lg-7">
								<a href="{{ route('customer.checkout',$transaksi->first()->id_transaksi) }}" class="btn btn-secondary container py-2"><i class="fas fa-cart-arrow-down"></i> Checkout</a>
							</div>
							<div class="col-sm-3 col-md-2 col-lg-2">
								<h3>Subtotal : </h3>
							</div>
							<div class="col-sm-3 col-md-3 col-lg-3">
								<h3 class="float-right">Rp. {{ $subtotal }},-</h3>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection