<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
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
				</div>