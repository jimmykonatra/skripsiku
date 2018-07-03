@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Pencairan Dana</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahPencairanDana">
						<i class="fa fa-plus"></i> Tambah Pencairan Dana
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Tanggal Cair Dana</th>
								<th>Nomor Bukti</th>
								<th>Nominal</th>
								<th>Pemberi</th>
								<th>Penerima</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Tanggal Cair Dana</th>
								<th>Nomor Bukti</th>
									<th>Nominal</th>
								<th>Pemberi</th>
								<th>Penerima</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($pencairandana as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->tanggal_cair_dana}}</td>
								<td>{{$data->nomor_bukti}}</td>
								<td>Rp {{number_format( $data->nominal, 0 , '' , '.' )}}	</td>
								<td>{{$data->pemberi}}</td>
								<td>{{$data->penerima}}</td>
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

				<div class="modal fade" id="modalUbahPencairanDana">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Pencairan Dana</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pencairandana/ubah')}}" method="post" id="formUbahPencairanDana">
									{{csrf_field()}}
									<input type="hidden" name="pencairandana" id="idUbah">
                                    <div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Cair Dana SBUM :</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
	
										<input type="text" class="form-control tanggalcairPencairanDana" style="display:inline-block" name="tanggalcair">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
									</div>
                                    <p>
										<label class="col-lg-6">Nomor Bukti: </label>
										<input type="number" class="col-lg-4" id="nomorbuktiUbahPencairanDana" name="nomorbukti" placeholder="Masukkan Nomor Bukti Pencairan Dana"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Nominal: </label>
										<input type="number" class="col-lg-4" id="nominalUbahPencairanDana" name="nominal" placeholder="Masukkan Nominal Pencairan Dana"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Pemberi: </label>
										<input type="text" class="col-lg-4" id="pemberiUbahPencairanDana" name="pemberi" placeholder="Masukkan Pemberi Pencairan Dana">
									</p>
                                    <p>
										<label class="col-lg-6">Penerima: </label>
										<input type="text" class="col-lg-4" id="penerimaUbahPencairanDana" name="penerima" placeholder="Masukkan Penerima Pencairan Dana">
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

				<div class="modal fade" id="modalHapusPencairanDana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Data Pencairan Dana</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Apakah anda yakin ingin menghapus data pencairan dana ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('pencairandana/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="pencairandana" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahPencairanDana">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Pencairan Dana</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('pencairandana/tambah')}}" method="post" id="formTambahPencairanDana">
						{{csrf_field()}}
						  			<p>
										<label for="tanggalcairdana" class="col-lg-4">Tanggal Cair Dana:</label>
										<input type="date" id="tanggalTambahPencairanDana" name="tanggal" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalpencairandana">
									</p>
                                    <p>
										<label class="col-lg-6">Nomor Bukti: </label>
										<input type="number" class="col-lg-4" id="nomorbuktiTambahPengeluaran" name="nomorbukti" placeholder="Masukkan Nomor Bukti Pencairan Dana"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Nominal: </label>
										<input type="number" class="col-lg-4" id="nominalTambahPencairanDana" name="nominal" placeholder="Masukkan Nominal Pencairan Dana"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Pemberi: </label>
										<input type="text" class="col-lg-4" id="pemberiTambahPencairanDana" name="pemberi" placeholder="Masukkan Pemberi Pencairan Dana">
									</p>
                                    <p>
										<label class="col-lg-6">Penerima: </label>
										<input type="text" class="col-lg-4" id="penerimaTambahPencairanDana" name="penerima" placeholder="Masukkan Penerima Pencairan Dana">
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
				$('#modalHapusPencairanDana').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahPencairanDana').modal('show');
			});

			$.fn.datepicker.defaults.format = "dd/mm/yyyy";

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('pencairandana/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('.tanggalcairPencairanDana').datepicker('update', data.tanggalcair);
						$('#nomorbuktiUbahPencairanDana').val(data.nomorbukti);
						$('#nominalUbahPencairanDana').val(data.nominal);
						$('#pemberiUbahPencairanDana').val(data.pemberi);
						$('#penerimaUbahPencairanDana').val(data.penerima);						
					}
				);
				$('#modalUbahPencairanDana').modal('show');
			});

		});
	</script>

	@endsection