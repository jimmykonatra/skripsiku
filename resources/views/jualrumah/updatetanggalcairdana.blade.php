@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Data Jual Rumah</div>
			<div class="card-body">

				@include('layouts.flash')

				

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nomor Nota</th>
								<th>Tanggal Down Payment</th>
								<th>Tanggal Buat</th>
								<th>Total</th>
								<th>Status Kelengkapan</th>
								<th>Keterangan</th>
								<th>Tanggal Serah Terima</th>
								<th>Jenis Bayar</th>
								<th>Status Jual Rumah</th>
								<th>Customer</th>
								<th>Marketing</th>
								<th>Kasir</th>
								<th>Nomor Rumah</th>
								<th>Tanggal Cair Dana</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nomor Nota</th>
								<th>Tanggal Down Payment</th>
								<th>Tanggal Buat</th>
								<th>Total</th>
								<th>Status Kelengkapan</th>
								<th>Keterangan</th>
								<th>Tanggal Serah Terima</th>
								<th>Jenis Bayar</th>
								<th>Status Jual Rumah</th>
								<th>Customer</th>
								<th>Nomor Rumah</th>
								<th>Marketing</th>
								<th>Kasir</th>
								<th>Tanggal Cair Dana</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($jualrumah as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->nomor_nota}}</td>
								<td>{{$data->tanggal_dp}}</td>
								<td>{{$data->tanggal_buat}}</td>
								<td>{{$data->total}}</td>

								@if($data->status_kelengkapan == 1)
								<td>Lengkap</td>
								@else
								<td>Tidak Lengkap</td>
								@endif
                                
								<td>{{$data->keterangan}}</td>
								<td>{{$data->tanggal_serah_terima_rumah}}</td>
								<td>{{$data->jenis_bayar}}</td>
								<td>{{$data->status_jual_rumah}}</td>
								<td>{{$data->customer->nama}}</td>
								<td>{{$data->marketing->karyawan->nama}}</td>
								<td>{{$data->kasir->karyawan->nama}}</td>
								<td>{{$data->rumah->tipe->blok}}{{$data->rumah->nomor}}</td>
								<td>{{$data->pencairandana->tanggal_cair_dana}}</td>
								<td>
									<a href = "{{url('jualrumah/lihat')}}" class="btn btn-primary">Ubah</a>
								</td>
								<td>
									<a href class="btn btnHapus btn-danger">Hapus</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="modal fade" id="modalUpdateTanggalCairDanaJualRumah">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Data Tanggal Cair Dana</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('updatetanggalcairdana/ubah')}}" method="post" id="formUbahBank">
									{{csrf_field()}}
									<p>
										<input type="hidden" id="idUbah" name="updatetanggalcairdana">
										<label class="col-lg-6">Nomor Nota: </label>
										<input type="number" class="col-lg-4" id="nomornotaUbahJualRumah" name="nomornota" placeholder="Masukkan Nomor Nota" required>
									</p>
									<p>
                                        <input type="hidden" id="idUbah" name="updatetanggalbuat">
										<label for="tanggalcairkpr" class="col-lg-4">Tanggal Buat:</label>
										<input type="date" id="tanggalbuatUbahJualRumah" name="tanggalbuat" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalbuatjualrumah">
                                    </p>
                                    <p>
                                        <input type="hidden" id="idUbah" name="updatetanggaldp">
										<label for="tanggaldpjualrumah" class="col-lg-4">Tanggal DP:</label>
										<input type="date" id="tanggaldpUbahJualRumah" name="tanggaldp" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggaldpjualrumah">
									</p>
                                    <p>
										<label class="col-lg-6">Total: </label>
										<input type="number" class="col-lg-4" id="totalUbahJualRumah" name="total" placeholder="Masukkan Total" required>
									</p>
                                    <p>
										<label class="col-lg-6">Status Kelengkapan: </label>
										<select name="statuskelengkapan" id="statuskelengkapanUbahJualRumah">
											<option value="Lengkap">Lengkap</option>
											<option value="Tidak Lengkap">Tidak Lengkap</option>
										</select>
									</p>
                                    <p>
										<label class="col-lg-6">Keterangan: </label>
										<input type="text" class="col-lg-4" id="keteranganUbahJualRumah" name="keterangan" placeholder="Masukkan Keterangan" required>
									</p>
									<p>
                                        <input type="hidden" id="idUbah" name="updatetanggalserahterimarumah">
										<label for="tanggalserahterimarumahjualrumah" class="col-lg-4">Tanggal Serah Terima Rumah:</label>
										<input type="date" id="tanggalserahterimarumahUbahJualRumah" name="tanggalserahterimarumah" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalserahterimarumahjualrumah">
									</p>
									<p>
										<label class="col-lg-6">Jenis Bayar: </label>
										<select name="jenisbayar" id="jenisbayarUbahJualRumah">
											<option value="Cash">Cash</option>
											<option value="KPR">KPR</option>
										</select>
                                    </p>
                                    <p>
										<label class="col-lg-6">Status Jual Rumah: </label>
										<select name="statusjualrumah" id="statusjualrumahUbahJualRumah">
											<option value="Jadi">Jadi</option>
											<option value="Tidak Jadi">Tidak Jadi</option>
										</select>
                                    </p>
                                    <p>
										<label class="col-lg-6">Customer: </label>
										<select name="customer" id="customerUbahJualRumah">
										@foreach($customer as $data)
												<option value="{{$data->id}}">{{$data->customer->nama}}</option>	
										@endforeach
										</select>
                                    </p>
                                    <p>
										<label class="col-lg-6">Marketing: </label>
										<select name="marketing" id="marketingUbahJualRumah">
										@foreach($marketing as $data)
												<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>	
										@endforeach
										</select>
                                    </p>
                                    <p>
										<label class="col-lg-6">Kasir: </label>
										<select name="kasir" id="kasirUbahJualRumah">
										@foreach($kasir as $data)
												<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>	
										@endforeach
										</select>
                                    </p>
                                    <p>
										<label class="col-lg-6">Nomor Rumah: </label>
										<select name="rumah" id="rumahUbahJualRumah">
										@foreach($rumah as $data)
                                                <option value="{{$data->id}}">
                                                    {{$data->rumah->tipe->blok}}{{$data->rumah->nomor}}</option>	
										@endforeach
										</select>
									</p>
                                    <p>
                                        <input type="hidden" id="idUbah" name="updatetanggalcairdana">
										<label for="tanggalcairdanajualrumah" class="col-lg-4">Tanggal Cair Dana:</label>
										<input type="date" id="tanggalcairdanaUbahJualRumah" name="tanggalcairdana" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalcairdanajualrumah">
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

				<div class="modal fade" id="modalHapusJualRumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

								<form id="hapus-form" action="{{ url('jualrumah/hapus') }}" method="POST" style="display:none;">
									{{ csrf_field() }}
									<input type="hidden" name="jualrumah" id="idHapus">
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
							<input type="text" class="col-lg-4" id="contactpersonTambahBank" name="contactperson" placeholder="Masukkan Contact Person Bank"
							    required>
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
				$('#modalHapusNota').modal('show');
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
				$('#modalUpdateTanggalCairDanaJualRumah').modal('show');
			});

		});
	</script>

	@endsection