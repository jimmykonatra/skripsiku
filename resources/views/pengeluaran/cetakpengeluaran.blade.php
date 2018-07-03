<html>
                    <head>
                        <style>
                            table.tabel_normal {
                                border-collapse: collapse;
                                text-align:center;  
                                border:1px;
                            }
                            table {
                                width:100%;
                            }
                            body {
                                 font-family: Times New Roman;
                                 font-size:18px;
                         
                                 
                            }
                        </style>
                    </head>
                    <body>
                        <h2 style="text-align:center;"><u>KWITANSI PENGELUARAN</u></h2><br>
                        <p><b >PT. SUMBER LANGGENG SEJAHTERA<br>PERUMAHAN PESSONA WIROLEGI</b></p>
                        <p><b></b></p>
                        
                        <table>
                        <tr>
                           <td height="30"width="200">Kwitansi </td>
                           <td>: 00{{$pengeluaran->id}}</td>
                        </tr>
                        <tr>
                            
                            <td width="200">Telah terima dari</td>
                            <td>: PT. Sumber Langgeng Sejahtera</td>
                            {{-- <td>: {{$customer->nama}} </td> --}}
                            
                        </tr>
                        <tr>
                            <td height="30" width="200">Uang terbilang sebanyak</td>
                            <td>: {{$total}} </td>
                            {{-- <td>: {{$total}} Rupiah </td> --}}
                            
                        </tr>
                        <tr>
                            <td height="30" width="200">Nomor Pembangunan</td>
                        <td>: {{$pembangunan->nomor}}</td>
                        </tr>
                        <tr>
                            <td height="30" width="200">Rumah</td>
                        <td>: {{$tipe->blok}} - {{$rumah->nomor}}</td>
                        </tr>
                        <tr>
                            <td height="30" width="200">Untuk Pembayaran </td>
                        <td>: {{$jenispengeluaran->nama}}</td>
                        </tr>
                        
                        
                    </table>
    
        <table>
           
                        <tr style="font-weight:bold">
                            <td height="70" width="200">Jumlah </td>
                            <td>: Rp {{number_format( $pengeluaran->nominal, 0 , '' , '.' )}} </td>
                            
                        </tr>
                        <tr>
                            
                        </tr>
        </table>
       
       <div>
                        <table style="text-align:right">
                        
                        <tr>
                           
                            <td><p>Jember, {{$pengeluaran->tanggal}} </p></td>
                        </tr>
                        <tr>
                            <td height="60"></td>
                        </tr>
                        <tr>
                        <td height="60">{{$kasir->karyawan->nama}}</td>
                        {{-- <td>{{$kasir->karyawan->nama}}</td> --}}
                        </tr>
                        
                    </table>
                </div>

      </body>
</html>
