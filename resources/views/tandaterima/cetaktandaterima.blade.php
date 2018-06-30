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
                                 font-size:12px"
                            }
                        </style>
                    </head>
                    <body>
                        <h2 style="text-align:center" ><u>TANDA TERIMA</u></h2>
                        <p><b>PT. SUMBER LANGGENG SEJAHTERA<br>PERUMAHAN PESSONA WIROLEGI</b></p>
                        <p><b></b></p>
                        
                        <table>
                        <tr>
                            <td width="200" style="padding-left:40px">Telah terima dari</td>
                            <td>: {{$customer->nama}} </td>
                            
                        </tr>
                        <tr>
                            <td width="200" style="padding-left:40px">Uang terbilang sebanyak</td>
                            <td>: {{$total}} Rupiah </td>
                            
                        </tr>
                        
                        
                    </table>
        <br>
        <p><b>Untuk pembayaran sebagian / pelunasan harga pembelian rumah & tanah di perumahan Pessona Wirolegi </b></p>
    
        <table>
                        <tr>
                            <td width="200" style="padding-left:20px">Perumahan</td>
                            <td colspan="4">: {{$perumahan->nama}} </td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Tipe </td>
                        <td colspan="4">: {{$tipe->nama}}</td>
                            
                        </tr>
                        
                        <tr>
                            <td style="padding-left:20px">Blok </td>
                            <td colspan="4">: {{$tipe->blok}} </td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Nomor </td>
                        <td colspan="4">: {{$rumah->nomor}}</td>
                           
                        </tr>
                        
        </table>
        <br>
        <table>
            <br>
                    <tr>
                            <td width="200" style="padding-left:20px">Booking Fee</td>
                            <td colspan="4">: Rp {{number_format( $tandaterima->booking_fee, 0 , '' , '.' )}} </td>
                            
                        </tr>
                            
                        <tr>
                            <td style="padding-left:20px">Uang Muka</td>
                            <td colspan="4">: Rp {{number_format( $tandaterima->uang_muka, 0 , '' , '.' )}} </td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Dana Tambahan</td>
                            <td colspan="4">: Rp {{number_format( $tandaterima->uang_tambahan, 0 , '' , '.' )}} </td>
                            
                        </tr>
                        <tr>
                            <td style="padding-left:20px">Dana KPR </td>
                            <td colspan="4">: Rp {{number_format( $tandaterima->dana_kpr, 0 , '' , '.' )}}</td>
                           
                          
                        </tr>
                        <br><br>
                        <tr>
                            <td>

                            </td>
                            <td>
                                _______________________________________      +
                            </td>
                        </tr>
                        <tr style="font-weight:bold">
                            <td style="padding-left:20px"><br><br>Total </td>
                            <td colspan="4">: Rp {{number_format( $tandaterima->total, 0 , '' , '.' )}} </td>
                            
                        </tr>
        </table>
        
        
     
       <div>
                        <table style="text-align:center">
                        
                        <tr>
                           
                            <td></td>
                            <td width="200"><p>Jember, {{date('d-M-Y')}} </p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td height="60"></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>{{$kasir->karyawan->nama}}</td>
                          
                        </tr>
                        
                    </table>
                </div>

      </body>
</html>
