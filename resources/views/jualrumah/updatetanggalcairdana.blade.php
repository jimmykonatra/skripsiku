@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Update Cair Dana SBUM</div>
			<div class="card-body">

				@include('layouts.flash')

			

				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nomor Nota</th>
								<th>Customer</th>
								<th>Nomor Rumah</th>
								
								
								{{-- <th>Total</th> --}}
								<th>Tanggal Cair Dana</th>
								<th>Marketing</th>
								<th>Kasir</th>
								<th>Delete</th>
						
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nomor Nota</th>
								<th>Customer</th>
								<th>Nomor Rumah</th>
								
								
								{{-- <th>Total</th> --}}
							
								<th>Tanggal Cair Dana</th>
								<th>Marketing</th>
								<th>Kasir</th>
								<th>Delete</th>
						
							</tr>
						</tfoot>
						<tbody>
							@foreach($jualrumah as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->nomor_nota}}</td>
								<td>{{$data->customer->nama}}</td>
								<td>{{$data->rumah->tipe->blok}}{{$data->rumah->nomor}}</td>
								{{-- <td>Rp {{number_format( $data->total, 0 , '' , '.' )}}</td> --}}
								
								@if(isset($data->pencairandana->tanggal_cair_dana))
								<td>{{$data->pencairandana->tanggal_cair_dana}}</td>
								@else
								<td></td>
								@endif
								
								<td>{{$data->kasir->karyawan->nama}}</td>
								<td>{{$data->marketing->karyawan->nama}}</td>
							
								<td>
									<a href class="btn btnUbah btn-primary">Update</a>
								</td>
								{{-- <td>
									<a href = "{{url('jualrumah/lihat/'.$data->id)}}" class="btn btn-primary">Ubah</a>
								</td> --}}
								
								{{-- <td>
									<a href = "{{url('jualrumah/cetak/'.$data->id)}}" class="btn btnPrint btn-success">Print</a>
								</td> --}}
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			<div class="modal fade" id="modalUbahCairDana">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Update Cair Dana SBUM</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('updatetanggalcairdana/ubah')}}" enctype=multipart/form-data method="post" id="formUbahCairDana">
									{{csrf_field()}}
								
                                    <p>
									<input type="hidden" id="idUbah" name="updatetanggalcairdana">
										<label class="col-lg-6">Nomor Jual Rumah: </label>
										<select name="jualrumah"  id="jualrumahUbahCairDana">
										@foreach($jualrumah as $data)
											<option value="{{$data->id}}">{{$data->nomor_nota}}</option>
										@endforeach
									</select>
									</p>
									
									<p>
									
										<label class="col-lg-6">Rumah: </label>
										<select name="rumah"  id="rumahUbahCairDana" disabled>
										@foreach($rumah as $data)
										<option value="{{$data->id}}">{{$data->tipe->blok}} - {{$data->nomor}}</option>
										@endforeach
									</select>
									</p>
									<p>
										
										<label class="col-lg-6"><b>Pencairan Dana: </b></label>
										<select style="border:solid black 2px" name="pencairandana"  id="pencairandanaUbahCairDana">
										@foreach($pencairandana as $data)
											<option value="{{$data->id}}">{{$data->nomor_bukti}}</option>
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

				<div class="modal fade" id="modalHapusJualRumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Hapus Nota Jual Rumah</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Yakin menghapus nota jual rumah ini?</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
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
				$('#modalHapusJualRumah').modal('show');
			});

			$('.btnTambah').on('click', function (e) {
				e.preventDefault();
				$('#modalTambahBank').modal('show');
			});

			$('.btnUbah').on('click', function (e) {
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$.post("{{url('updatetanggalcairdana/lihat')}}", {
						'id': id,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
						$('#idUbah').val(data.id);
						$('#customerUbahCairDana').val(data.customer);
						$('#rumahUbahCairDana').val(data.rumah);
						$('#pencairandanaUbahCairDana').val(data.pencairandana);
						$('#jualrumahUbahCairDana').val(data.jualrumah);
					}
				);
				$('#modalUbahCairDana').modal('show');
			});

		});
	</script>

	@endsection