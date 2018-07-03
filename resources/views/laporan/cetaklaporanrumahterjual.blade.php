<html>
                    <head>
						<style>
							
						</style>
                    </head>
                    <body>
						<h2 style="text-align:center">LAPORAN RUMAH TERJUAL</h2>
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
								<th height="30" style="border-collapse:collapse;border:1px solid black">Nomor Transaksi</th>
								<th style="border-collapse:collapse;border:1px solid black">Rumah</th>
								<th style="border-collapse:collapse;border:1px solid black">Customer</th>
								<th style="border-collapse:collapse;border:1px solid black">Alamat Customer</th>
								<th style="border-collapse:collapse;border:1px solid black">KPR / Cash</th>
								<th style="border-collapse:collapse;border:1px solid black">Bank</th>
							</tr>
						</thead>
						 
						<tbody >
							@foreach($kpr as $data)
							<tr>
							<td height="30" style="border-collapse:collapse;border:1px solid black">{{$data->Nomor_Transaksi}}</td>
							<td style="border-collapse:collapse;border:1px solid black">{{$data->Blok}} - {{$data->Nomor_Rumah}}</td>
							<td style="border-collapse:collapse;border:1px solid black">{{$data->Nama_Customer}}</td>
							<td style="border-collapse:collapse;border:1px solid black">{{$data->Alamat}}</td>
							<td style="border-collapse:collapse;border:1px solid black">{{$data->Jenis_Bayar}}</td>
							<td style="border-collapse:collapse;border:1px solid black">{{$data->Nama_Bank}}</td>
							</tr>
							@endforeach
						</tbody>
                    </table>
                    <br>
				
				</div>
        <br>
        <br>
       
      </body></html>
