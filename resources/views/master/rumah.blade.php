@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Rumah</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahRumah">
						<i class="fa fa-plus"></i> Tambah Rumah
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Perumahan</th>
								<th>Tipe Rumah</th>
								<th>Nomor Rumah</th>
								<th>Tahun </th>
								<th>Status Pembangunan</th>
								<th>Status Booking</th>
								<th>Status Terjual</th>
								<th>Keterangan</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Perumahan</th>
								<th>Tipe Rumah</th>
								<th>Nomor Rumah</th>
								<th>Tahun </th>
								<th>Status Pembangunan</th>
								<th>Status Booking</th>
								<th>Status Terjual</th>
								<th>Keterangan</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($rumah as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->perumahan->nama}}</td>
                                <td>{{$data->tipe->nama}}</td>
								<td>{{$data->nomor}}</td>
								<td>{{$data->tahun}}</td>
							@if($data->status_pembangunan == 1)
                                <td>Proses Pembangunan</td>
                            @else
                                <td>Selesai Pembangunan</td>
                            @endif
                    
                            @if($data->status_booking == 1)
							    <td>Terbooking</td>
                            @else
                                <td>Kosong</td>
                            @endif
                            
                            @if($data->status_terjual == 1)
							    <td>Terjual</td>
                            @else
                                <td>Belum Terjual</td>
                            @endif
							<td>{{$data->keterangan}}</td>
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

				<div class="modal fade" id="modalUbahRumah">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Rumah</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('rumah/ubah')}}" enctype=multipart/form-data method="post" id="formUbahRumah">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="rumah">
										<label class="col-lg-6">Perumahan: </label>
										<select name="perumahan"  id="perumahanUbahRumah">
										@foreach($perumahan as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>
                                    <p>
									
										<label class="col-lg-6">Tipe: </label>
										<select name="tipe"  id="tipeUbahRumah">
										@foreach($tipe as $data)
											<option value="{{$data->id}}">{{$data->nama}}</option>
										@endforeach
									</select>
									</p>	
									<p>
										<label class="col-lg-6">Nomor: </label>
										<input type="number" class="col-lg-4" id="nomorUbahRumah" name="nomor" placeholder="Masukkan Nomor Rumah"
										    required>
									</p>
                                    <p>
										<label class="col-lg-6">Tahun: </label>
										<input type="year" class="col-lg-4" id="tahunUbahRumah" name="tahun" placeholder="Masukkan Tahun Rumah"
										    required>
									</p>
                                    <p>
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
									</p>
									<p>
										<label class="col-lg-6">Keterangan: </label>
										<input type="text" class="col-lg-4" id="keteranganUbahRumah" name="keterangan" placeholder="Masukkan Keterangan Rumah">
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

				<div class="modal fade" id="modalHapusRumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<input type="number" class="col-lg-4" id="nomorTambahRumah" name="nomor" placeholder="Masukkan Nomor Rumah"
										    required>
									</p>
                                    <p>
										<label class="col-lg-6">Tahun: </label>
										<input type="number" class="col-lg-4" id="tahunTambahRumah" name="tahun" placeholder="Masukkan Tahun Rumah"
										    required>
									</p>
                                    <p>
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
									</p>
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
				$.post("{{url('rumah/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#perumahanUbahRumah').val(data.perumahan);
                        $('#tipeUbahRumah').val(data.tipe);
                        $('#nomorUbahRumah').val(data.nomor);
                        $('#tahunUbahRumah').val(data.tahun);
						$('#statuspembangunanUbahRumah').val(data.statuspembangunan);
                        $('#statusbookingUbahRumah').val(data.statusbooking);
                        $('#statusterjualUbahRumah').val(data.statusterjual);
						$('#keteranganUbahRumah').val(data.keterangan);
						
					
						
					}
				);
				$('#modalUbahRumah').modal('show');
			});

		});
	</script>

	@endsection