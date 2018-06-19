@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Customer</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahCustomer">
						<i class="fa fa-plus"></i> Tambah Customer
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Kota</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th>Pekerjaan</th>
								<th>No KTP</th>
								<th>No Rekening</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Kota</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th>Pekerjaan</th>
								<th>No KTP</th>
								<th>No Rekening</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($customer as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->nama}}</td>
								<td>{{$data->alamat}}</td>
								<td>{{$data->kota}}</td>
								<td>{{$data->email}}</td>
							
								<td>{{$data->no_telepon}}</td>
								<td>{{$data->pekerjaan}}</td>
								<td>{{$data->no_ktp}}</td>
								<td>{{$data->no_rekening}}</td>
								<td>
									<button class="btn btnUbah btn-primary">Ubah</button>
								</td>
								<td>
									<button class="btn btnHapus btn-danger">Hapus</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="modal fade" id="modalUbahCustomer">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Customer</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('customer/ubah')}}" method="post" id="formUbahCustomer">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="customer">
										<label class="col-lg-6">Nama: </label>
										<input type="text" class="col-lg-4" id="namaUbahCustomer" name="nama" placeholder="Masukkan Nama Customer" required>
									</p>
									<p>
										<label class="col-lg-6">Alamat: </label>
										<input type="text" class="col-lg-4" id="alamatUbahCustomer" name="alamat" placeholder="Masukkan Alamat Customer" required>
									</p>
									<p>
										<label class="col-lg-6">Kota: </label>
										<input type="text" class="col-lg-4" id="kotaUbahCustomer" name="kota" placeholder="Masukkan Kota Customer" required>
									</p>
									<p>
										<label class="col-lg-6">Email: </label>
										<input type="email" class="col-lg-4" id="emailUbahCustomer" name="email" placeholder="Masukkan Alamat Email" required>
									</p>
									<p>
										<label class="col-lg-6">Nomor Telepon: </label>
										<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponUbahCustomer" name="notelepon" placeholder="Masukkan No Telepon"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Pekerjaan: </label>
										<input type="text" class="col-lg-4" id="pekerjaanUbahCustomer" name="pekerjaan" placeholder="Masukkan Pekerjaan Customer" required>
									</p>
									<p>
										<label class="col-lg-6">Nomor KTP: </label>
										<input type="number" class="col-lg-4" id="noktpUbahCustomer" name="noktp" placeholder="Masukkan Nomor KTP" required>
									</p>
									<p>
										<label class="col-lg-6">Nomor Rekening: </label>
										<input type="number" class="col-lg-4" id="norekeningUbahCustomer" name="norekening" placeholder="Masukkan Nomor Rekening"
										    required>
									</p>
									<p style="text-align:center">
										<button type="submit" class="btn btn-success" style="text-align:center" id="btnUbahKonfirmasi" class="btn btn-primary">
											<i class="fa fa-check"></i>Ubah</button>
									</p>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modalHapusCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('customer/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="customer" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahCustomer">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Customer</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('customer/tambah')}}" method="post" id="formTambahCustomer">
						{{csrf_field()}}
						<p>
							<input type="hidden" id="idUbah" name="customer">
							<label class="col-lg-6">Nama: </label>
							<input type="text" class="col-lg-4" id="namaTambahCustomer" name="nama" placeholder="Masukkan Nama Customer" required>
						</p>
						<p>
							<label class="col-lg-6">Alamat: </label>
							<input type="text" class="col-lg-4" id="alamatTambahCustomer" name="alamat" placeholder="Masukkan Alamat Customer" required>
						</p>
						<p>
							<label class="col-lg-6">Kota: </label>
							<input type="text" class="col-lg-4" id="kotaTambahCustomer" name="kota" placeholder="Masukkan Kota Customer" required>
						</p>
						<p>
							<label class="col-lg-6">Email: </label>
							<input type="email" class="col-lg-4" id="emailTambahCustomer" name="email" placeholder="Masukkan Alamat Email" required>
						</p>
						<p>
							<label class="col-lg-6">Nomor Telepon: </label>
							<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponTambahCustomer" name="notelepon" placeholder="Masukkan No Telepon"
							    required>
						</p>
						<p>
							<label class="col-lg-6">Pekerjaan: </label>
										<input type="text" class="col-lg-4" id="pekerjaanTambahCustomer" name="pekerjaan" placeholder="Masukkan Pekerjaan Customer" required>
									</p>
						<p>
							<label class="col-lg-6">Nomor KTP: </label>
							<input type="number" class="col-lg-4" id="noktpTambahCustomer" name="noktp" placeholder="Masukkan Nomor KTP" required>
						</p>
						<p>
							<label class="col-lg-6">Nomor Rekening: </label>
							<input type="number" class="col-lg-4" id="norekeningTambahCustomer" name="norekening" placeholder="Masukkan Nomor Rekening"
							    required>
						</p>

						<p style="text-align:center">
							<button type="submit" class="btn btn-success" style="text-align:center" id="btnTambahKonfirmasi" class="btn btn-primary">
								<i class="fa fa-check"></i>Tambah</button>
						</p>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.footer')
	<script>
		$(document).ready(function () {

			$('.btnHapus').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$('#idHapus').val(id);
				$('#modalHapusCustomer').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahCustomer').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('customer/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#namaUbahCustomer').val(data.nama);
						$('#alamatUbahCustomer').val(data.alamat);
						$('#kotaUbahCustomer').val(data.kota);
						$('#emailUbahCustomer').val(data.email);
						$('#pekerjaanUbahCustomer').val(data.pekerjaan);
						$('#noteleponUbahCustomer').val(data.notelepon);
						$('#noktpUbahCustomer').val(data.noktp);
						$('#norekeningUbahCustomer').val(data.norekening);
					}
				);
				$('#modalUbahCustomer').modal('show');
			});

		});
	</script>

	@endsection