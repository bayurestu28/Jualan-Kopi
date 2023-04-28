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
				
				<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
					<div class="card">
						<div class="card-header bg-secondary text-light">
							<h3>Riwayat Pemesanan</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive text-nowrap">
								<table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th width="3%">#</th>
											<th>ID</th>
											<th>Biaya</th>
											<th>Waktu Transaksi</th>
											<th>Pemesan</th>
											<th>No. Telp</th>
											<th>Alamat</th>
											<th>Jenis Pengiriman</th>
											<th>Status</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="3%">#</th>
											<th>ID</th>
											<th>Biaya</th>
											<th>Waktu Transaksi</th>
											<th>Pemesan</th>
											<th>No. Telp</th>
											<th>Alamat</th>
											<th>Jenis Pengiriman</th>
											<th>Status</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $no=1 ?>
										@foreach($transaksi as $data)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $data->id_transaksi }}</td>
											<td>{{ $data->biaya }}</td>
											<td>{{ $data->waktu_transaksi }}</td>
											<td>{{ $data->pemesan }}</td>
											<td>{{ $data->nohp_pemesan }}</td>
											<td>{{ $data->alamat_pemesan }}</td>
											<td>{{ $data->jenis_pengiriman }}</td>
											@if($data->status_transaksi == 'Uncheckout')
											<td class="bg-secondary text-light">{{ $data->status_transaksi }}</td>
											@elseif($data->status_transaksi == 'Checkout')
											<td class="bg-warning text-light">{{ $data->status_transaksi }}</td>
											@elseif($data->status_transaksi == 'Lunas')
											<td class="bg-success text-light">{{ $data->status_transaksi }}</td>
											@elseif($data->status_transaksi == 'Dikirim')
											<td class="bg-primary text-light">{{ $data->status_transaksi }}</td>
											@else
											<td class="bg-info text-light">{{ $data->status_transaksi }}</td>
											@endif
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection