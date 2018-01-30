@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Nota</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<a href = "{{url('nota/buat')}}" class="btn btn-success">
						<i class="fa fa-plus"></i> Buat Nota
					</a>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Nomor Nota</th>
								<th>Tanggal Buat</th>
                                <th>Total</th>
								<th>Tanggal Serah Terima</th>
                                <th>Status Kelengkapan</th>
                                <th>Keterangan</th>
                                <th>Customer</th>
                                <th>Marketing</th>
                                <th>Kasir</th>
                                <th>Nomor Rumah</th>
                                <th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								 <th>Nomor Nota</th>
								<th>Tanggal Buat</th>
                                <th>Total</th>
								<th>Tanggal Serah Terima</th>
                                <th>Status Kelengkapan</th>
                                <th>Keterangan</th>
                                <th>Customer</th>
                                <th>Marketing</th>
                                <th>Kasir</th>
                                <th>Nomor Rumah</th>
                                <th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($nota as $nota)
							<tr id="{{$nota->id}}">
								<td>{{$nota->nomor}}</td>
                                <td>{{$nota->tanggal_buat}}</td>
                                <td>{{$nota->total}}</td>
                                <td>{{$nota->tanggal_serah_terima}}</td>
								@if($nota->status_kelengkapan == 1)
								<td>Lengkap</td>
								@else
								<td>Tidak Lengkap</td>
								@endif
                                <td>{{$nota->keterangan}}</td>
                                <td>{{$nota->customer->nama}}</td>
								<td></td>
                                <td></td>
                                <td>{{$nota->rumah->tipe->blok}}{{$nota->rumah->nomor}}</td>
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

				<div class="modal fade" id="modalUbahBank">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Bank</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('bank/ubah')}}" method="post" id="formUbahBank">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="bank">
										<label class="col-lg-6">Nama: </label>
										<input type="text" class="col-lg-4" id="namaUbahBank" name="nama" placeholder="Masukkan Nama Bank" required>
									</p>
									<p>
										<label class="col-lg-6">Contact Person: </label>
										<input type="text" class="col-lg-4" id="contactpersonUbahBank" name="contactperson" placeholder="Masukkan Contact Person" required>
                                    </p>
                                    <p>
										<label class="col-lg-6">No Telepon: </label>
										<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponUbahBank" name="notelepon" placeholder="Masukkan No Telepon"
										    required>
                                    </p>
                                    <p>
										<label class="col-lg-6">Alamat: </label>
										<input type="text" class="col-lg-4" id="alamatUbahBank" name="alamat" placeholder="Masukkan Alamat" required>
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

				<div class="modal fade" id="modalHapusBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

								<form id="hapus-form" action="{{ url('bank/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="bank" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahBank">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Nota</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('bank/tambah')}}" method="post" id="formTambahBank">
						{{csrf_field()}}
						<p>
							<label class="col-lg-6">Nama: </label>
							<input type="text" class="col-lg-4" id="namaTambahBank" name="nama" placeholder="Masukkan Nama Bank" required>
						</p>
						<p>
							<label class="col-lg-6">Contact Person: </label>
							<input type="text" class="col-lg-4" id="contactpersonTambahBank" name="contactperson" placeholder="Masukkan Contact Person Bank" required>
                        </p>
                        <p>
							<label class="col-lg-6">No Telepon: </label>
							<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="noteleponTambahBank" name="notelepon" placeholder="Masukkan No Telepon"
							    required>
                        </p>	
                        <p>
							<label class="col-lg-6">Alamat: </label>
							<input type="text" class="col-lg-4" id="alamatTambahBank" name="alamat" placeholder="Masukkan Alamat Bank" required>
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
				$('#modalHapusBank').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahBank').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('bank/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#namaUbahBank').val(data.nama);
						$('#contactpersonUbahBank').val(data.contactperson);
						$('#noteleponUbahBank').val(data.notelepon);
						$('#alamatUbahBank').val(data.alamat);
						}
				);
				$('#modalUbahBank').modal('show');
			});

		});
	</script>

	@endsection