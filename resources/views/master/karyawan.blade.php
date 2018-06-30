@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Karyawan</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahKaryawan">
						<i class="fa fa-plus"></i> Tambah Karyawan
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th>Jabatan</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th>Jabatan</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($karyawan as $karyawan)
							<tr id="{{$karyawan->id}}">
								<td>{{$karyawan->nama}}</td>
								<td>{{$karyawan->alamat}}</td>
								<td>{{$karyawan->email}}</td>
								<td>{{$karyawan->no_telepon}}</td>
								<td>{{$karyawan->user->jabatan}}</td>
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

				<div class="modal fade" id="modalUbahKaryawan">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Karyawan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('karyawan/ubah')}}" method="post" id="formUbahKaryawan">
									{{csrf_field()}}
									<p>
										<label class="col-lg-6">Username: </label>
										<input type="text" class="col-lg-4" id="usernameUbahKaryawan" name="username" 
										    required disabled>
									</p>
									<p>
										<input type="hidden" id="idUbah" name="karyawan">
										<label class="col-lg-6">Nama: </label>
										<input type="text" class="col-lg-4" id="namaUbahKaryawan" name="nama" placeholder="Masukkan Nama Karyawan" required>
									</p>
									<p>
										<label class="col-lg-6">Alamat: </label>
										<input type="text" class="col-lg-4" id="alamatUbahKaryawan" name="alamat" placeholder="Masukkan Alamat Karyawan" required>
									</p>
									<p>
										<label class="col-lg-6">No Telepon: </label>
										<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponUbahKaryawan" name="notelepon" placeholder="Masukkan No Telepon"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Email: </label>
										<input type="email" class="col-lg-4" id="emailUbahKaryawan" name="email" placeholder="Masukkan Alamat Email" required>
									</p>
									<p>
										<label class="col-lg-6">Kata Sandi: </label>
										<input type="password" class="col-lg-4" id="passwordUbahKaryawan" name="password" placeholder="Masukkan Kata Sandi" required>
									</p>
									<p>
										<label class="col-lg-6">Ulangi Kata Sandi: </label>
										<input type="password" class="col-lg-4" id="repasswordUbahKaryawan" name="repassword" placeholder="Masukkan Ulang Kata Sandi"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Jabatan: </label>
										<select name="jabatan" id="jabatanUbahKaryawan" class="col-lg-4">
											<option value="0">Kasir</option>
											<option value="1">Marketing</option>
										</select>
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

				<div class="modal fade" id="modalHapusKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Yakin akan menghapus data karyawan ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('karyawan/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="karyawan" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahKaryawan">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Karyawan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('karyawan/tambah')}}" method="post" id="formTambahKaryawan">
						{{csrf_field()}}
						<p>
							<label class="col-lg-6">Username: </label>
							<input type="text" class="col-lg-4" id="usernameTambahKaryawan" name="username" placeholder="Masukkan Username Karyawan"
							    required>
						</p>
						<p>
							<label class="col-lg-6">Nama: </label>
							<input type="text" class="col-lg-4" id="namaTambahKaryawan" name="nama" placeholder="Masukkan Nama Karyawan" required>
						</p>
						<p>
							<label class="col-lg-6">Alamat: </label>
							<input type="text" class="col-lg-4" id="alamatTambahKaryawan" name="alamat" placeholder="Masukkan Alamat Karyawan" required>
						</p>
						<p>
							<label class="col-lg-6">No Telepon: </label>
							<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponTambahKaryawan" name="notelepon" placeholder="Masukkan No Telepon"
							    required>
						</p>
						<p>
							<label class="col-lg-6">Email: </label>
							<input type="email" class="col-lg-4" id="emailTambahKaryawan" name="email" placeholder="Masukkan Alamat Email" required>
						</p>
						<p>
							<label class="col-lg-6">Kata Sandi: </label>
							<input type="password" class="col-lg-4" id="passwordTambahKaryawan" name="password" placeholder="Masukkan Kata Sandi" required>
						</p>
						<p>
							<label class="col-lg-6">Ulangi Kata Sandi: </label>
							<input type="password" class="col-lg-4" id="repasswordTambahKaryawan" name="repassword" placeholder="Masukkan Ulang Kata Sandi"
							    required>
						</p>
						<p>
							<label class="col-lg-6">Jabatan: </label>
							<select name="jabatan" id="jabatanTambahKaryawan" class="col-lg-4">
								<option value="0">Kasir</option>
								<option value="1">Marketing</option>
							</select>
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

			$('#formUbahKaryawan').on('submit', function (e) {
				e.preventDefault();
				var pass = $('#passwordUbahKaryawan').val();
				var repass = $('#repasswordUbahKaryawan').val();
				if (pass == repass) {
					$('#formUbahKaryawan')[0].submit();
				} else {
					alert('Password Tidak Sama');
				}
			});

			$('.btnHapus').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$('#idHapus').val(id);
				$('#modalHapusKaryawan').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahKaryawan').modal('show');
			});

			$('#formTambahKaryawan').on('submit', function (e) {
				e.preventDefault();
				var pass = $('#passwordTambahKaryawan').val();
				var repass = $('#repasswordTambahKaryawan').val();
				if (pass == repass) {
					$('#formTambahKaryawan')[0].submit();
				} else {
					alert('Password Tidak Sama');
				}
			});


			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('karyawan/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#usernameUbahKaryawan').val(data.username);
						$('#namaUbahKaryawan').val(data.nama);
						$('#alamatUbahKaryawan').val(data.alamat);
						$('#emailUbahKaryawan').val(data.email);
						$('#noteleponUbahKaryawan').val(data.notelepon);
						if (data.jabatan == 'Kasir') {
							$('#jabatanUbahKaryawan').val(0);
						} else {
							$('#jabatanUbahKaryawan').val(1);
						}
					}
				);
				$('#modalUbahKaryawan').modal('show');
			});

		});
	</script>

	@endsection