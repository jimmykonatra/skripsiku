@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Pengeluaran</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahPengeluaran">
						<i class="fa fa-plus"></i> Tambah Pengeluaran
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Jenis Pengeluaran</th>
								<th>Nomor Pembangunan</th>
								<th>Tanggal</th>
								<th>Nominal</th>
								<th>Keterangan</th>
								<th>Status Lunas</th>
								<th>Kasir</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Print</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Jenis Pengeluaran</th>
								<th>Nomor Pembangunan</th>
								<th>Tanggal</th>
								<th>Nominal</th>
								<th>Keterangan</th>
								<th>Status Lunas</th>
								<th>Kasir</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Print</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($pengeluaran as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->jenis_pengeluaran->nama}}</td>
								<td>{{$data->pembangunan->nomor}}</td>
								<td>{{$data->tanggal}}</td>
								<td>Rp {{number_format( $data->nominal, 0 , '' , '.' )}}</td>
								<td>{{$data->keterangan}}</td>
								<td>{{$data->status_lunas}}</td>
								<td>{{$data->kasir->karyawan->nama}}</td>
								@if($data->status_lunas == "Lunas")
								<td>
									<button class="btn btnUbah btn-primary" disabled>Ubah</button>
								</td>
								@else
								<td>
									<button class="btn btnUbah btn-primary">Ubah</button>
								</td>
								@endif
								{{-- ---------------------------------------------- --}}
								<td>
									<button class="btn btnHapus btn-danger">Hapus</button>
								</td>
								{{-- .......................................................... --}}
								<td>
                                    <a href = "{{url('pengeluaran/cetak/'.$data->id)}}" class="btn btnPrint btn-success">Print</a>
                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="modal fade" id="modalUbahPengeluaran">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Pengeluaran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pengeluaran/ubah')}}" method="post" id="formUbahBank">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="pengeluaran">
										<label class="col-lg-6">Jenis Pengeluaran: </label>
										<select name="jenispengeluaran" id="jenispengeluaranUbahPengeluaran">
											@foreach($jenispengeluaran as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
											@endforeach
										</select>
									</p>
									<p>
										<label class="col-lg-6">Nomor Pembangunan: </label>
										<select name="pembangunan" id="pembangunanUbahPengeluaran">
											@foreach($pembangunan as $data)

											<option value="{{$data->id}}">{{$data->nomor}}</option>
											@endforeach
										</select>
									</p>

									<div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Buat</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
	
										<input type="text" class="form-control tanggalPengeluaran" style="display:inline-block" name="tanggal">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
									</div>
									<p>
										<label class="col-lg-6">Nominal: </label>
										<input type="number" class="col-lg-4" id="nominalUbahPengeluaran" name="nominal" placeholder="Masukkan Nominal Pengeluaran"
										    required>
									</p>
									<p>
										<label class="col-lg-6">Keterangan: </label>
										<input type="text" class="col-lg-4" id="keteranganUbahPengeluaran" name="keterangan" placeholder="Masukkan Keterangan Pengeluaran">
									</p>
									<p>
										<label class="col-lg-6">Status Lunas: </label>
										<select name="statuslunas" id="statuslunasUbahPengeluaran">
											<option value="Hutang">Hutang</option>
											<option value="Lunas">Lunas</option>
										</select>
									</p>
									<p>
										<label class="col-lg-6">Kasir: </label>
										<select name="kasir" id="kasirUbahPengeluaran">
											@foreach($kasir as $data)
											<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>

											@endforeach
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

				<div class="modal fade" id="modalHapusPengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengeluaran</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Apakah anda yakin ingin menghapus data pengeluaran ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('pengeluaran/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="pengeluaran" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahPengeluaran">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Pengeluaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('pengeluaran/tambah')}}" method="post" id="formTambahPengeluaran">
						{{csrf_field()}}
						<p>
							<input type="hidden" id="idUbah" name="pengeluaran">
							<label class="col-lg-6">Jenis Pengeluaran: </label>
							<select name="jenispengeluaran">
								@foreach($jenispengeluaran as $data)
								<option value="{{$data->id}}">{{$data->nama}}</option>
								@endforeach
							</select>
						</p>
						<p>
										<label class="col-lg-6">Nomor Pembangunan: </label>
										<select name="pembangunan" id="pembangunanTambahPengeluaran">
											@foreach($pembangunan as $data)

											<option value="{{$data->id}}">{{$data->nomor}}</option>
											@endforeach
										</select>
									</p>

						<p>
							<label for="tanggal" class="col-lg-4">Tanggal Buat:</label>
							<input type="date" name="tanggal" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" data-date-format="dd-mm-yyyy"
							    data-date-viewmode="years" required>
						</p>
						<p>
							<label class="col-lg-6">Nominal: </label>
							<input type="number" class="col-lg-4" name="nominal" placeholder="Masukkan Nominal Pengeluaran" required>
						</p>
						<p>
							<label class="col-lg-6">Keterangan: </label>
							<input type="text" class="col-lg-4" name="keterangan" placeholder="Masukkan Keterangan Pengeluaran">
						</p>
						<p>
							<label class="col-lg-6">Status Lunas: </label>
							<select name="statuslunas">
								<option value="Hutang">Hutang</option>
								<option value="Lunas">Lunas</option>
							</select>
						</p>
						<p>
							<label class="col-lg-6">Kasir: </label>
							<select name="kasir" id="kasirUbahPengeluaran">
								@foreach($kasir as $data)

								<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>

								@endforeach
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

			$('.btnHapus').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$('#idHapus').val(id);
				$('#modalHapusPengeluaran').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahPengeluaran').modal('show');
			});

			// Bootstrap datepicker
			
			$.fn.datepicker.defaults.format = "dd/mm/yyyy";

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('pengeluaran/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#jenispengeluaranUbahPengeluaran').val(data.jenispengeluaran);
						$('#pembangunanUbahPengeluaran').val(data.pembangunan);
						$('.tanggalPengeluaran').datepicker('update', data.tanggal);
						$('#nominalUbahPengeluaran').val(data.nominal);
						$('#keteranganUbahPengeluaran').val(data.keterangan);
						$('#statuslunasUbahPengeluaran').val(data.statuslunas);
						$('#kasirUbahPengeluaran').val(data.kasir);

					}
				);
				$('#modalUbahPengeluaran').modal('show');
			});

		});
	</script>

	@endsection