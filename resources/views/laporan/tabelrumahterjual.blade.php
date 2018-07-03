<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nomor Transaksi</th>
								<th>Rumah</th>
								<th>Customer</th>
								<th>Alamat Customer</th>
								<th>KPR / Cash</th>
								<th>Bank</th>
								
							</tr>
						</thead>
						
						<tbody>
							@foreach($kpr as $data)
							<tr>
							<td>{{$data->Nomor_Transaksi}}</td>
							<td>{{$data->Blok}} - {{$data->Nomor_Rumah}}</td>
							<td>{{$data->Nama_Customer}}</td>
							<td>{{$data->Alamat}}</td>
							<td>{{$data->Jenis_Bayar}}</td>
							<td>{{$data->Nama_Bank}}</td>
							{{-- <td> {{$data->blok}} - {{$data->nomor}} </td>
							<td>{{$data->customer->nama	}}</td>
							<td>{{$data->customer->alamat}}</td>
							<td>{{$data->kasir->karyawan->nama}}</td>
							<td>{{$data->marketing->karyawan->nama}}</td>
							<td>{{$data->jenis_bayar}}</td> --}}
				
								{{-- <td>{{$data->jenis_pengeluaran->nama}}</td> --}}
								{{-- <td>{{$data->tanggal}}</td> --}}
								{{-- <td>Rp {{number_format( $data->nominal, 0 , '' , '.' )}}</td> --}}
								{{-- <td>{{$data->keterangan}}</td> --}}
								{{-- <td>{{$data->status_lunas}}</td> --}}
								{{-- <td>{{$data->kasir->karyawan->nama}}</td> --}}
							</tr>
							@endforeach
						</tbody>
					</table>
				{{-- <h4 style="text-align:center">Total : Rp {{number_format( $pengeluaran->sum("nominal"), 0 , '' , '.' )}}</h4> --}}
				</div>