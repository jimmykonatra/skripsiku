<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nomor Pembangunan</th>
								<th>Jenis Pengeluaran</th>
								<th>Tanggal</th>
								<th>Nominal</th>
								<th>Keterangan</th>
								<th>Status Lunas</th>
								<th>Kasir</th>
								
							</tr>
						</thead>
						
						<tbody>
							@foreach($pengeluaran as $data)
							<tr id="{{$data->id}}">
								<td>{{$data->pembangunan->nomor}}</td>
								<td>{{$data->jenis_pengeluaran->nama}}</td>
								<td>{{$data->tanggal}}</td>
								<td>Rp {{number_format( $data->nominal, 0 , '' , '.' )}}</td>
								<td>{{$data->keterangan}}</td>
								<td>{{$data->status_lunas}}</td>
								<td>{{$data->kasir->karyawan->nama}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				<h4 style="text-align:center">Total : Rp {{number_format( $pengeluaran->sum("nominal"), 0 , '' , '.' )}}</h4>
				<button class="btn btnLihat btn-success pull-right"  type="submit" style="margin-left:20px" data-toggle="modal" >
						Print
					</button>
				</div>