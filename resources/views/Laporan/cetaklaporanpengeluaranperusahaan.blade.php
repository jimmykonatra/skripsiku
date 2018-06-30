<html>
                    <head>
                    </head>
                    <body>
                        <h2 style="text-align:center">LAPORAN PENGELUARAN PERUSAHAAN</h2>
                        <p><b>Periode </b></p>
                        <table>
                        <tr>
                            
                            <td width="200" style="padding-left:40px">Tanggal :  <span style="margin-right:20px;margin-left:20px">{{$tglawal}}</span>      <b>-</b>  <span style="margin-left:20px">{{$tglakhir}}</span></td>
                       
        
                            
                        </tr>
                        
                       
                       
                    </table>
        <br>
        
        <br>
        
        <div>
					<table style="text-align:center" width="100%">
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
                    <br>
				<h3 style="text-align:center">Total : Rp {{number_format( $pengeluaran->sum("nominal"), 0 , '' , '.' )}}</h3>
				</div>
        <br>
        <br>
       
      </body></html>
