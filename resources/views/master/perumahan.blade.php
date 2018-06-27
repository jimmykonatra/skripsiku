@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Perumahan</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahPerumahan">
						<i class="fa fa-plus"></i> Tambah Perumahan
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
                                <th>Alamat</th>
								<th>Luas(m2)</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
                                <th>Alamat</th>
								<th>Luas(m2)</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($perumahan as $perumahan)
							<tr id="{{$perumahan->id}}">
								<td>{{$perumahan->nama}}</td>
                                <td>{{$perumahan->alamat}}</td>
                                <td>{{number_format( $perumahan->luas, 0 , '' , '.' )}}</td>
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

				<div class="modal fade" id="modalUbahPerumahan">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Perumahan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('perumahan/ubah')}}" method="post" id="formUbahperumahan">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="perumahan">
										<label class="col-lg-6">Nama Perumahan: </label>
										<input type="text" class="col-lg-4" id="namaUbahPerumahan" name="nama" placeholder="Masukkan Nama Perumahan" required>
									</p>
									<p>
										<label class="col-lg-6">Alamat: </label>
										<input type="text" class="col-lg-4" id="alamatUbahPerumahan" name="alamat" placeholder="Masukkan Alamat" required>
                                    </p>
                                    <p>
										<label class="col-lg-6">Luas(m2): </label>
										<input type="number" class="col-lg-4" id="luasUbahPerumahan" name="luas" placeholder="Masukkan Luas Perumahan" required>
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

				<div class="modal fade" id="modalHapusPerumahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Data Perumahan</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Apakah anda yakin ingin menghapus data perumahan ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('perumahan/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="perumahan" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahPerumahan">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Perumahan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('perumahan/tambah')}}" method="post" id="formTambahPerumahan">
						{{csrf_field()}}
						<p>
							<label class="col-lg-6">Nama: </label>
							<input type="text" class="col-lg-4" id="namaTambahPerumahan" name="nama" placeholder="Masukkan Nama Perumahan" required>
						</p>
						<p>
							<label class="col-lg-6">Alamat: </label>
							<input type="text" class="col-lg-4" id="alamatTambahPerumahan" name="alamat" placeholder="Masukkan Alamat Perumahan" required>
                        </p>
                        <p>
							<label class="col-lg-6">Luas(m2):</label>
							<input type="number" class="col-lg-4" id="luasTambahPerumahan" name="luas" placeholder="Masukkan Luas Perumahan" required>
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
				$('#modalHapusPerumahan').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahPerumahan').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('perumahan/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#namaUbahPerumahan').val(data.nama);
                        $('#alamatUbahPerumahan').val(data.alamat);
                        $('#luasUbahPerumahan').val(data.luas);
						}
				);
				$('#modalUbahPerumahan').modal('show');
			});

		});
	</script>

	@endsection