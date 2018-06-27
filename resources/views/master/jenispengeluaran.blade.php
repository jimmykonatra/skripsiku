@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Jenis Pengeluaran</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahJenisPengeluaran">
						<i class="fa fa-plus"></i> Tambah Jenis Pengeluaran
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama</th>
                                <th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nama</th>
                                <th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($jenispengeluaran as $jenispengeluaran)
							<tr id="{{$jenispengeluaran->id}}">
								<td>{{$jenispengeluaran->nama}}</td>
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

				<div class="modal fade" id="modalUbahJenisPengeluaran">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Jenis Pengeluaran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('jenispengeluaran/ubah')}}" method="post" id="formUbahJenisPengeluaran">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="jenispengeluaran">
										<label class="col-lg-6">Nama Jenis Pengeluaran: </label>
										<input type="text" class="col-lg-4" id="namaUbahJenisPengeluaran" name="nama" placeholder="Masukkan Nama Jenis Pengeluaran" required>
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

				<div class="modal fade" id="modalHapusJenisPengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Data Jenis Pengeluaran</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Apakah anda yakin ingin menghapus data jenis pengeluaran ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('jenispengeluaran/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="jenispengeluaran" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahJenisPengeluaran">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Jenis Pengeluaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('jenispengeluaran/tambah')}}" method="post" id="formTambahJenisPengeluaran">
						{{csrf_field()}}
						<p>
							<label class="col-lg-6">Nama: </label>
							<input type="text" class="col-lg-4" id="namaTambahJenisPengeluaran" name="nama" placeholder="Masukkan Nama Jenis Pengeluaran" required>
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
				$('#modalHapusJenisPengeluaran').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahJenisPengeluaran').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('jenispengeluaran/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#namaUbahJenisPengeluaran').val(data.nama);
                    }
				);
				$('#modalUbahJenisPengeluaran').modal('show');
			});

		});
	</script>

	@endsection