<html>
                    <head>
						<style>
							
						</style>
                    </head>
                    <body>
						<h2 style="text-align:center">LAPORAN PENGELUARAN PERUSAHAAN</h2>
						<h2 style="text-align:center">PT SUMBER LANGGENG SEJAHTERA</h2>
                        <p><b>Periode </b></p>
                        <table>
                        <tr>
                            
                            <td width="200" style="padding-left:40px">Tanggal :  <span style="margin-right:20px;margin-left:20px">{{$tglawal}}</span>      <b>-</b>  <span style="margin-left:20px">{{$tglakhir}}</span></td>
                       
        
                            
                        </tr>
                        
                       
                       
            </table>
        <br>    
        <br>
        <div>
					<table style="text-align:center;border-collapse:collapse;border:1px solid black" width="100%">
						<thead  >
							<tr>
								<th height="30" style="border-collapse:collapse;border:1px solid black">Nomor Pembangunan</th>
								<th style="border-collapse:collapse;border:1px solid black">Jenis Pengeluaran</th>
								<th style="border-collapse:collapse;border:1px solid black">Tanggal</th>
								<th style="border-collapse:collapse;border:1px solid black">Nominal</th>
								<th style="border-collapse:collapse;border:1px solid black">Keterangan</th>
								<th style="border-collapse:collapse;border:1px solid black">Status Lunas</th>
								<th style="border-collapse:collapse;border:1px solid black">Kasir</th>
								
							</tr>
						</thead>
						 
						<tbody >
							@foreach($pengeluaran as $data)
							<tr id="{{$data->id}}">
								<td height="30" style="border-collapse:collapse;border:1px solid black">{{$data->pembangunan->nomor}}</td>
								<td style="border-collapse:collapse;border:1px solid black">{{$data->jenis_pengeluaran->nama}}</td>
								<td style="border-collapse:collapse;border:1px solid black">{{$data->tanggal}}</td>
								<td style="border-collapse:collapse;border:1px solid black">Rp {{number_format( $data->nominal, 0 , '' , '.' )}}</td>
								<td style="border-collapse:collapse;border:1px solid black">{{$data->keterangan}}</td>
								<td style="border-collapse:collapse;border:1px solid black">{{$data->status_lunas}}</td>
								<td style="border-collapse:collapse;border:1px solid black">{{$data->kasir->karyawan->nama}}</td>
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
