@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('css') @endsection @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Tanda Terima</div>
            <div class="card-body">

                @include('layouts.flash')

                <div class="pull-right" style="padding-bottom:20px">
                    <button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahCicilan">
                        <i class="fa fa-plus"></i> Tambah Tanda Terima
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Penjualan</th>
                                <th>Tanggal</th>
                                <th>Booking Fee</th>
                                <th>Dana KPR</th>
                                <th>Uang Muka</th>
                                <th>Uang Tambahan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Kasir</th>
                             
                                <th>Delete</th>
                                <th>Print</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor Penjualan</th>
                                <th>Tanggal</th>
                                <th>Booking Fee</th>
                                <th>Dana KPR</th>
                                <th>Uang Muka</th>
                                <th>Uang Tambahan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Kasir</th>
                                
                                <th>Delete</th>
                                <th>Print</th>
                           
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($tandaterima as $data)
                            <tr id="{{$data->id}}">
                                <td>{{$data->jual_rumah->nomor_nota}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>Rp {{number_format( $data->booking_fee, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->dana_kpr, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->uang_muka, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->uang_tambahan, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->total, 0 , '' , '.' )}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>{{$data->kasir->karyawan->nama}}</td>
                               
                                <td>
                                    <button class="btn btnHapus btn-danger">Hapus</button>
                                </td>
                                <td>
                                    <a href = "{{url('tandaterima/cetak/'.$data->id)}}" class="btn btnPrint btn-success">Print</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="modalUbahTandaTerima">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Tanda Terima</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('tandaterima/ubah')}}" method="post" id="formUbahTandaTerima">
                                    {{csrf_field()}}
                                    <div class="row col-lg-12">
                                        
                                        <input type="hidden" id="idBisa" name="tandaterima">
                                        <label class="col-lg-6">Nomor Penjualan: </label>
                                        <select name="nomornota" id="nomornotaUbahTandaTerima">
                                            @foreach($jualrumah as $data)
                                            <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row col-lg-12">
                                        <label for="tanggal" class="col-lg-4">Tanggal:</label>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">
                                            <input type="text" class="form-control tanggalTandaTerima" style="display:inline-block" name="tanggal">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>  
                                    </div>
                                    <p>
                                        <label class="col-lg-6">Booking Fee: </label>
                                        <input type="number" class="col-lg-4" id="bookingfeeUbahTandaTerima" name="bookingfee" placeholder="Masukkan Booking Fee">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Dana KPR: </label>
                                        <input type="number" class="col-lg-4" id="danakprUbahTandaTerima" name="danakpr" placeholder="Masukkan Dana KPR">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Uang Muka: </label>
                                        <input type="number" class="col-lg-4" id="uangmukaUbahTandaTerima" name="uangmuka" placeholder="Masukkan Uang Muka">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Uang Tambahan: </label>
                                        <input type="number" class="col-lg-4" id="uangtambahanUbahTandaTerima" name="uangtambahan" placeholder="Masukkan Uang Tambahan">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Total: </label>
                                        <input type="number" class="col-lg-4" id="totalUbahTandaTerima" name="total" placeholder="Masukkan Total Tanda Terima">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Keterangan: </label>
                                        <input type="text" class="col-lg-4" id="keteranganUbahTandaTerima" name="keterangan" placeholder="Masukkan Keterangan Tanda Terima">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Kasir: </label>
                                        <select name="kasir" id="kasirUbahTandaTerima">
                                            @foreach($kasir as $data)

                                            <option value="{{$data->id}}">{{$data->karyawan->nama}}</option>

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

                <div class="modal fade" id="modalHapusTandaTerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tanda Terima</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin menghapus data tanda terima ini?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();">Hapus</a>

                                <form id="hapus-form" action="{{ url('tandaterima/hapus') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tandaterima" id="idHapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahTandaTerima">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Tanda Terima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('tandaterima/tambah')}}" method="post" id="formTambahTandaTerima">
                        {{csrf_field()}}
                        <div>
                           
                            <label class="col-lg-6">Nomor Penjualan: </label>
                            <select name="nomornota" id="nomornotaTambahTandaTerima">
                                @foreach($jualrumah as $data)
                                <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row col-lg-12">
                            <label for="tanggal" class="col-lg-6">Tanggal:</label>
                            <div class="input-group date col-lg-6" data-provide="datepicker">
                                <input type="text" class="form-control" style="display:inline-block" name="tanggal" value="{{date('d/m/Y')}}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <p>
                            <label class="col-lg-6">Booking Fee: </label>
                            <input type="number" class="col-lg-4" id="bookingfeeTambahTandaTerima" name="bookingfee" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Dana KPR: </label>
                            <input type="number" class="col-lg-4" id="danakprTambahTandaTerima" name="danakpr" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Uang Muka: </label>
                            <input type="number" class="col-lg-4" id="uangmukaTambahTandaTerima" name="uangmuka" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Uang Tambahan: </label>
                            <input type="number" class="col-lg-4" id="uangtambahanTambahTandaTerima" name="uangtambahan" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Keterangan: </label>
                            <input type="text" class="col-lg-4" id="keteranganTambahTandaTerima" name="keterangan" placeholder="Masukkan Keterangan Tanda Terima">
                        </p>
                        <p>
                            <label class="col-lg-6">Kasir: </label>
                            <select name="kasir" id="kasirTambahTandaTerima">
                                @foreach($kasir as $data)

                                <option value="{{$data->id}}">{{$data->karyawan->nama}}</option>

                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label class="col-lg-6">Total: </label>
                            <input type="number" class="col-lg-4" id="totalTambahTandaTerima" name="total" disabled placeholder="0">
                        </p>

                        <p>
                            <label class="col-lg-6"><b>Total Uang Muka Yang Sudah Dibayar: </b></label>
                            <input type="text" class="col-lg-4" id="totaluangmukaTambahTandaTerima" name="keterangan" readonly>
                        </p>
                        <p>
                            <label class="col-lg-6"><b>Total Uang Muka Yang HARUS Dibayar: </b></label>
                        <input type="text" class="col-lg-4" id="uangmukawajibTambahTandaTerima" name="keterangan" readonly>
                            
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
            
            var nomornota = $('#nomornotaTambahTandaTerima').val();


				$.post("{{url('tandaterima/lihattotal')}}", {
						'nomornota' : nomornota,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
                        $('#totaluangmukaTambahTandaTerima').val(data.jumlahuangmuka);
                        $('#uangmukawajibTambahTandaTerima').val(data.uangmuka);
                        
					}
				);

            $('.btnHapus').on('click', function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').attr('id');
                $('#idHapus').val(id);
                $('#modalHapusTandaTerima').modal('show');
            });

            $('#nomornotaTambahTandaTerima').on('change', function(e)
			{
				// var tanggalawal = $('#tanggalawal').val();
				// var tanggalakhir = $('#tanggalakhir').val();
				// var pembangunan = $('#pembangunan').val();
				// console.log(pembangunan);
				// console.log(tanggalawal);
				// console.log(tanggalakhir);
                var nomornota = $(this).val();
                

				$.post("{{url('tandaterima/lihattotal')}}", {
						'nomornota' : nomornota,
						'_token': "{{csrf_token()}}"
					},
					function (data) {
                        $('#totaluangmukaTambahTandaTerima').val(data.jumlahuangmuka);
                        $('#uangmukawajibTambahTandaTerima').val(data.uangmuka);
                        
                        
					}
				);
			});

            $('.btnTambah').on('click', function (e) {
                e.preventDefault();
                //menampilkan tanggal now ketika mulai tambah
                var d = new Date();

                var month = d.getMonth() + 1;
                var day = d.getDate();

                var output = d.getFullYear() + '/' +
                    (month < 10 ? '0' : '') + month + '/' +
                    (day < 10 ? '0' : '') + day;
                $('.datepicker').datepicker('update', output);
                $('#modalTambahTandaTerima').modal('show');

            });

            $('#bookingfeeTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var uangmuka = parseInt($('#uangmukaTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + uangmuka + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#danakprTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var uangmuka = parseInt($('#uangmukaTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + uangmuka + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#uangmukaTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var uangmuka = parseInt($('#uangmukaTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + uangmuka + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#uangtambahanTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var uangmuka = parseInt($('#uangmukaTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + uangmuka + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });


            $.fn.datepicker.defaults.format = "dd/mm/yyyy";

            $('.btnUbah').on('click', function (e) {
                e.preventDefault(); //cek submit
                var id = $(this).closest('tr').attr('id'); 
                $('#idBisa').val(id);
                $.post("{{url('tandaterima/lihat')}}", {
                     'id': id, 
                        '_token': "{{csrf_token()}}"
                    },
                    function (data) {
                        $('#idUbah').val(data.id);
                        $('#nomornotaUbahTandaTerima').val(data.nomornota);
                        $('.tanggalTandaTerima').datepicker('update', data.tanggal);
                        $('#bookingfeeUbahTandaTerima').val(data.bookingfee);
                        $('#danakprUbahTandaTerima').val(data.danakpr);
                        $('#uangmukaUbahTandaTerima').val(data.uangmuka);
                        $('#uangtambahanUbahTandaTerima').val(data.uangtambahan);
                        $('#totalUbahTandaTerima').val(data.total);
                        $('#keteranganUbahTandaTerima').val(data.keterangan);
                        $('#kasirUbahTandaTerima').val(data.kasir);
                    }
                );
                $('#modalUbahTandaTerima').modal('show');
            });

        });
    </script>

    @endsection