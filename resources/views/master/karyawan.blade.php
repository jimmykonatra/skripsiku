@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content')

@include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Table Example</div>
      <div class="card-body">

        @include('layouts.flash')

        <div class="pull-right" style="padding-bottom:20px">
          <button class="btn btn-success" data-toggle="modal" data-target="#modalAddKaryawan">
            <i class="fa fa-plus"></i> Tambah Karyawan
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($karyawan as $karyawan)
              <tr id="{{$karyawan->id}}">
                <td>{{$karyawan->nama}}</td>
                <td>{{$karyawan->alamat}}</td>
                <td>{{$karyawan->email}}</td>
                <td>{{$karyawan->no_telepon}}</td>
                <td>{{$karyawan->user->jabatan}}</td>
								<td><button class="btn btnUbah btn-primary">Ubah</button></td>
								<td><button class="btn btnHapus btn-danger">Hapus</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal fade" id="modalEditKaryawan">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Ubah Data Karyawan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('master/karyawan/update')}}" method="post" id="formEditKaryawan">
							{{csrf_field()}}
							<p>
								<label class="col-lg-6">Nama: </label>
								<input type="text" class="col-lg-4" id="nama" name="nama" placeholder="Masukkan Nama Karyawan" required>
							</p>
							<p>
								<label class="col-lg-6">Alamat: </label>
								<input type="text" class="col-lg-4" id="alamat" name="alamat" placeholder="Masukkan Alamat Karyawan" required>
							</p>
							<p>
								<label class="col-lg-6">No Telepon: </label>
								<input type="tel" pattern="^[+]?[0-9]{9,15}$" class="col-lg-4" id="notelepon" name="notelepon" placeholder="Masukkan No Telepon"
								 required>
							</p>
							<p>
								<label class="col-lg-6">Email: </label>
								<input type="email" class="col-lg-4" id="email" name="email" placeholder="Masukkan Alamat Email" required>
							</p>
							<p>
								<label class="col-lg-6">Kata Sandi: </label>
								<input type="password" class="col-lg-4" id="editPassword" name="password" placeholder="Masukkan Kata Sandi" required>
							</p>
							<p>
								<label class="col-lg-6">Ulangi Kata Sandi: </label>
								<input type="password" class="col-lg-4" id="editRepassword" name="repassword" placeholder="Masukkan Ulang Kata Sandi" required>
							</p>
							<p>
								<label class="col-lg-6">Hak Akses: </label>
								<select name="admin" id="admin" class="col-lg-4">
									<option value="0">Karyawan</option>
									<option value="1">Admin</option>
								</select>
							</p>
							<p>
								<label class="col-lg-6">Status Terdaftar: </label>
								<select name="status" id="status" class="col-lg-4">
									<option value="0">Tidak Aktif</option>
									<option value="1">Aktif</option>
								</select>
							</p>

							<p style="text-align:center">
								<button type="submit" class="btn btn-success" style="text-align:center" id="btnEdit" class="btn btn-primary">
									<i class="fa fa-check"></i> Ubah</button>
							</p>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalHapusKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <form id="hapus-form" action="{{ url('karyawan/hapus') }}" method="POST" style="display:none;">
						{{ csrf_field() }}
							<input type="hidden" name="karyawan" id="idHapus">
				    </form>
          </div>
        </div>
      </div>
    </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
	@include('layouts.footer')
	<script>
		$(document).ready(function(){

			$('.btnHapus').on('click', function(e){
				e.preventDefault();
				var id = $(this).closest('tr').attr('id');
				$('#idHapus').val(id);
				$('#modalHapusKaryawan').modal('show');
			});
		});
	</script>
	
	@endsection
