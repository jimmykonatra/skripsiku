@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Pembangunan</div>
			<div class="card-body">

				@include('layouts.flash')

				<div class="pull-right" style="padding-bottom:20px">
					<button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahPembangunan">
						<i class="fa fa-plus"></i> Tambah Pembangunan
					</button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nomor Kontrak Pembangunan</th>
                                <th>Rumah</th>
								<th>Tanggal Mulai</th>
								<th>Lama Pembangunan (hari)</th>
								<th>Tanggal Selesai</th>
                                <th>Penanggung Jawab</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Selesai</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nomor Kontrak Pembangunan</th>
                                <th>Rumah</th>
								<th>Tanggal Mulai</th>
								<th>Lama Pembangunan (hari)</th>
								<th>Tanggal Selesai</th>
                                <th>Penanggung Jawab</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Selesai</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($pembangunan as $data)
							<tr id="{{$data->id}}">
								{{-- <input type="hidden" value={{$data->pembangunan->rumah_id}}> --}}
                                <td>{{$data->nomor}}</td>
                                <td>{{$data->rumah->tipe->blok}} - {{$data->rumah->nomor}}</td>
								<td>{{$data->tanggal_mulai}}</td>
                                <td>{{$data->lama_pembangunan}}</td>

                                @if($data->tanggal_selesai == "0000-00-00")
                                <td>Kosong</td>
                                @else
                                <td>{{$data->tanggal_selesai}}</td>
                                @endif

                                <td>{{$data->penanggungjawab}}</td>
								@if($data->tanggal_selesai !== "0000-00-00")
								<td> Sudah Selesai </td>
								@else
								<td>
									<button class="btn btnUbah btn-primary">Ubah</button>
								</td>
								@endif
								
								@if($data->tanggal_selesai !== "0000-00-00")
								<td> Sudah Selesai </td>
								@else
								<td>
									<button class="btn btnHapus btn-danger">Hapus</button>
								</td>
								@endif

								@if($data->tanggal_selesai !== "0000-00-00")
								<td> Sudah Selesai </td>
								@else
								<td>
									<button class="btn btnSelesai btn-success">Selesai</button>
								</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="modal fade" id="modalUbahPembangunan">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Pembangunan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pembangunan/ubah')}}" method="post" id="formUbahPembangunan">
                                    {{csrf_field()}}
                                    <p>
										<label class="col-lg-6">Nomor Pembangunan: </label>
										<input type="number" class="col-lg-4" id="nomorUbahPembangunan" name="nominal" placeholder="Masukkan Nomor Pembangunan"
										    required>
									</p>
									<p>
										<input type="hidden" id="idUbah" name="pembangunan">
										<label class="col-lg-6">Rumah: </label>
										<select name="rumah" id="rumahUbahPembangunan">
											@foreach($rumah as $data)
											<option value="{{$data->id}}">{{$data->tipe->blok}} - {{$data->nomor}}</option>
											@endforeach
										</select>
									</p>
									<div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Mulai</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
										<input type="text" class="form-control tanggalmulaiUbahPembangunan" style="display:inline-block" name="tanggalmulai">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
									</div>
                                    <p>
										<label class="col-lg-6">Lama Pembangunan (hari): </label>
										<input type="number" class="col-lg-4" id="lamaPembangunanUbahPembangunan" name="lamapembangunan" placeholder="Masukkan Lama Pembangunan"
										    required>
									</p>
                                    
									<div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Selesai</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
										<input type="text" class="form-control tanggalselesaiUbahPembangunan" style="display:inline-block" name="tanggalselesai">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
                                    </div>
                                    
                                    <p>
							<label class="col-lg-6">Penanggung Jawab: </label>
							<input type="text" class="col-lg-4" id="penanggungjawabUbahPembangunan" name="penanggungjawab" placeholder="Masukkan Nama Penanggung Jawab" required>
						        </p>
									{{-- <p>
										<label class="col-lg-6">Status Lunas: </label>
										<select name="statuslunas" id="statuslunasUbahPembangunan">
											<option value="Hutang">Hutang</option>
											<option value="Lunas">Lunas</option>
										</select>
									</p> --}}
									{{-- <p>
										<label class="col-lg-6">Kasir: </label>
										<select name="kasir" id="kasirUbahPembangunan">
											@foreach($kasir as $data)

											<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>

											@endforeach
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

				<div class="modal fade" id="modalHapusPembangunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

								<form id="hapus-form" action="{{ url('pembangunan/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="pembangunan" id="idHapus">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
	{{-- MODAL SELESAI --}}
<div class="modal fade" id="modalSelesaiPembangunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Selesai Pembangunan</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Apakah anda yakin pembangunan telah selesai?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a href="#" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('selesai-form').submit();">Selesai</a>

								<form id="selesai-form" action="{{ url('pembangunan/selesai') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="pembangunan" id="idSelesai">
									<input type="hidden" name="rumah" id="idRumah">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

{{-- MODAL TAMBAH --}}
	<div class="modal fade" id="modalTambahPembangunan">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Pembangunan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('pembangunan/tambah')}}" method="post" id="formTambahPembangunan">
						{{csrf_field()}}
						<p>
										<label class="col-lg-6">Nomor Pembangunan: </label>
										<input type="number" class="col-lg-4" id="nomorTambahPembangunan" name="nomor" placeholder="Masukkan Nomor Pembangunan"
										    required>
									</p>
									<div class="row col-lg-12">
										<input type="hidden" id="idTambah" name="pembangunan">
										<label class="col-lg-6">Rumah: </label>
										 <div class="col-lg-6" >
										@foreach($rumah as $data)
											<div class="row col-lg-12">
									<input type="checkbox" class="rumah" name="rumah[]" value="{{$data->id}}"><span class="rumah">{{$data->tipe->blok}}- {{$data->nomor}}</span>
                                   </div>
                               
										@endforeach
										 </div>
										</div>
									<div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Mulai</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
										<input type="text" class="form-control tanggalmulaiTambahPembangunan" style="display:inline-block" name="tanggalmulai">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
									</div>
                                    <p>
										<label class="col-lg-6">Lama Pembangunan (hari): </label>
										<input type="number" class="col-lg-4" id="lamaPembangunanTambahPembangunan" name="lamapembangunan" placeholder="Masukkan Lama Pembangunan"
										    required>
									</p>
                                    
									<div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Selesai</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">
										<input type="text" class="form-control tanggalselesaiTambahPembangunan" style="display:inline-block" name="tanggalselesai">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
                                    </div>
                                    
                                    <p>
							<label class="col-lg-6">Penanggung Jawab: </label>
							<input type="text" class="col-lg-4" id="penanggungjawabTambahPembangunan" name="penanggungjawab" placeholder="Masukkan Nama Penanggung Jawab" required>
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
				$('#modalHapusPembangunan').modal('show');
			});

			$('.btnSelesai').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				var idRumah = $(this).closest('input').val();
				$('#idSelesai').val(id);
				$('#idRumah').val(idRumah);
				$('#modalSelesaiPembangunan').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahPembangunan').modal('show');
			});

			// Bootstrap datepicker
			
			$.fn.datepicker.defaults.format = "dd/mm/yyyy";

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('Pembangunan/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#jenisPembangunanUbahPembangunan').val(data.jenisPembangunan);
						$('#tanggalUbahPembangunan').val(data.tanggal);
						$('.tanggalPembangunan').datepicker('update', data.tanggal);
						$('#nominalUbahPembangunan').val(data.nominal);
						$('#keteranganUbahPembangunan').val(data.keterangan);
						$('#statuslunasUbahPembangunan').val(data.statuslunas);
						$('#kasirUbahPembangunan').val(data.kasir);

					}
				);
				$('#modalUbahPembangunan').modal('show');
			});

		});
	</script>

	@endsection