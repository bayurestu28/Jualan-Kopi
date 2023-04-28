@extends('layouts.customer.app',['tittle' => 'Coffee Shop | 100% Kualitas Terbaik'])

@section('content')
<div style="background-color: #DAD2C8; margin-top: 100px;" class="pb-5">
	<div class="bg-black-50 py-3 px-3 text-light bg-secondary" id="product">
		<h1 class="text-center">Detail Produk</h1>
		<div class="container">
			<hr class="bg-light" width="300" style="height: 3px;">
			<hr class="bg-light" width="100" style="height: 3px;">
		</div>
	</div>
	<div class="p-3">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6 mb-3">
					<h1>{{ $produk->nama_produk }}</h1>
					<div class="text-center">
						<img src='{{ asset("img/produk/$produk->gambar") }}' width="100%">
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 border-left">
					<div class="mt-5">
						<hr>
						<h2>Harga <i class="float-right">Rp. {{$produk->harga}},-</i></h1>
						<hr>
						<h2>Stok <i class="float-right">{{$produk->stok}} Pcs</i></h1>
						<hr>
					</div>
					<div class="my-5">
						<h1>
							<a href="{{ route('customer.addtocart',$produk->id_produk) }}" class="btn btn-secondary py-3 container"><i class="fas fa-cart-plus fa-lg"></i> Tambahkan ke Keranjang</a>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection