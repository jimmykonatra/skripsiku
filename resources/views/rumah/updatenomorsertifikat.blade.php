@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Sertifikat Rumah</div>
			<div class="card-body">

				@include('layouts.flash')

				

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Perumahan</th>
								<th>Tipe Rumah</th>
								<th>Nomor Rumah</th>
								<th>Tahun </th>
								<th>Nomor Sertifikat</th>
								{{-- <th>Status Pembangunan</th> --}}
								{{-- <th>Status Booking</th> --}}
								{{-- <th>Status Terjual</th> --}}
								{{-- <th>Keterangan</th> --}}
								<th>Edit</th>
								{{-- <th>Delete</th> --}}
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Perumahan</th>
								<th>Tipe Rumah</th>
								<th>Nomor Rumah</th>
								<th>Tahun </th>
								<th>Nomor Sertifikat</th>
								{{-- <th>Status Pembangunan</th> --}}
								{{-- <th>Status Booking</th> --}}
								{{-- <th>Status Terjual</th> --}}
								{{-- <th>Keterangan</th> --}}
								<th>Edit</th>
								{{-- <th>Delete</th> --}}
							</tr>
						</tfoot>
						<tbody>
							@foreach($rumah as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->perumahan->nama}}</td>
                                <td>{{$data->tipe->nama}}</td>
								<td>{{$data->nomor}}</td>
								<td>{{$data->tahun}}</td>
								<td>{{$data->nomor_sertifikat}}</td>
								{{-- <td>{{$data->status_pembangunan}}</td> --}}
							{{-- <td>{{$data->status_booking}}</td> --}}
							{{-- <td>{{$data->status_terjual}}</td> --}}
							{{-- <td>{{$data->keterangan}}</td> --}}
						        <td>
									<button class="btn btnUbah btn-primary">Update</button>
								</td>
								{{-- <td>
									<button class="btn btnHapus btn-danger">Hapus</button>
								</td> --}}
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="modal fade" id="modalUbahRumah">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Update Data Sertifikat Rumah</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('updatenomorsertifikat/ubah')}}" enctype=multipart/form-data method="post" id="formUbahRumah">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="updatenomorsertifikat">
										<label class="col-lg-6">Perumahan: </label>
										<select name="perumahan"  id="perumahanUbahRumah">
										@foreach($perumahan as $data)
											<option disabled value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>
                                    <p>
									
										<label class="col-lg-6">Tipe: </label>
										<select name="tipe"  id="tipeUbahRumah">
										@foreach($tipe as $data)
											<option disabled value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>	
									<p>
										<label class="col-lg-6">Nomor: </label>
										<input type="number" class="col-lg-4" id="nomorUbahRumah" name="nomor" placeholder="Masukkan Nomor Rumah"
										    required readonly>
									</p>
                                    <p>
										<label class="col-lg-6">Tahun: </label>
										<input type="number" class="col-lg-4" id="tahunUbahRumah" name="tahun" placeholder="Masukkan Tahun Rumah" readonly value="{{date('Y')}}" min=1990 max={{date( 'Y')}} required>
									</p>
									<p>
										<label class="col-lg-6"><b>Nomor Sertifikat: </b></label>
										<input type="number" class="col-lg-4" style="border-style:solid" id="nomorsertifikatUbahRumah" name="nomorsertifikat" required>
									</p>
                                    {{-- <p>
										<label class="col-lg-6">Status Pembangunan: </label>
										<select name="statuspembangunan" id="statuspembangunanUbahRumah">
											<option value="0">Selesai Pembangunan</option>
											<option value="1">Proses Pembangunan</option>
										</select>
									</p>
                                    <p>
										<label class="col-lg-6">Status Booking: </label>
										<select name="statusbooking" id="statusbookingUbahRumah">
											<option value="0">Kosong</option>
											<option value="1">Terbooking</option>
										</select>
									</p>
                                    <p>
										<label class="col-lg-6">Status Terjual: </label>
										<select name="statusterjual" id="statusterjualUbahRumah">
											<option value="0">Belum Terjual</option>
											<option value="1">Terjual</option>
										</select>
									</p> --}}
								
									

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

				<div class="modal fade" id="modalHapusRumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Rumah</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Yakin akan menghapus rumah ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
								<a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

								<form id="hapus-form" action="{{ url('rumah/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="rumah" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	<div class="modal fade" id="modalTambahRumah">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Rumah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('rumah/tambah')}}" method="post" enctype="multipart/form-data"  id="formTambahRumah">
						{{csrf_field()}}
                        			<p>
										<input type="hidden" id="idUbah" name="rumah">
										<label class="col-lg-6">Perumahan: </label>
										<select name="perumahan"  id="perumahanTambahRumah">
										@foreach($perumahan as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>
                                    <p>
										<input type="hidden" id="idUbah" name="rumah">
										<label class="col-lg-6">Tipe: </label>
										<select name="tipe"  id="tipeTambahRumah">
										@foreach($tipe as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>	
									<p>
										<label class="col-lg-6">Nomor: </label>
										<input type="number" class="col-lg-4" id="nomorTambahRumah" name="nomor" placeholder="Masukkan Nomor Rumah" value="1" min=1
										    required>
									</p>
                                    <p>
										<label class="col-lg-6">Tahun: </label>
										<input type="number" class="col-lg-4" id="tahunTambahRumah" name="tahun" placeholder="Masukkan Tahun Rumah" value="{{date('Y')}}" min=2000 max={{date( 'Y')}} required>
									</p>
                                    {{-- <p>
										<label class="col-lg-6">Status Pembangunan: </label>
										<select name="statuspembangunan" id="statuspembangunanTambahRumah">
											<option value="0">Selesai Pembangunan</option>
											<option value="1">Proses Pembangunan</option>
										</select>
									</p>
                                    <p>
										<label class="col-lg-6">Status Booking: </label>
										<select name="statusbooking" id="statusbookingTambahRumah">
											<option value="0">Kosong</option>
											<option value="1">Terbooking</option>
										</select>
									</p>
                                    <p>
										<label class="col-lg-6">Status Terjual: </label>
										<select name="statusterjual" id="statusterjualTambahRumah">
											<option value="0">Belum Terjual</option>
											<option value="1">Terjual</option>
										</select>
									</p> --}}
									<p>
										<label class="col-lg-6">Keterangan: </label>
										<input type="text" class="col-lg-4" id="keteranganTambahRumah" name="keterangan" placeholder="Masukkan Keterangan Rumah">
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
				$('#modalHapusRumah').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahRumah').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('updatenomorsertifikat/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#perumahanUbahRumah').val(data.perumahan);
                        $('#tipeUbahRumah').val(data.tipe);
                        $('#nomorUbahRumah').val(data.nomor);
                        $('#tahunUbahRumah').val(data.tahun);
						$('#nomorsertifikatUbahRumah').val(data.nomorsertifikat);
						// $('#statuspembangunanUbahRumah').val(data.statuspembangunan);
                        // $('#statusbookingUbahRumah').val(data.statusbooking);
                        // $('#statusterjualUbahRumah').val(data.statusterjual);
						// $('#keteranganUbahRumah').val(data.keterangan);	
					}
				);
				$('#modalUbahRumah').modal('show');
			});

		});
	</script>

	@endsection