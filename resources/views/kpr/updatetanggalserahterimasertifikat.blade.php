@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Update Data Serah Terima Sertifikat</div>
            <div class="card-body">

                @include('layouts.flash')

               
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Penjualan Rumah</th>
                                <th>Tanggal Akad Kredit</th>
                                <th>Tanggal Serah Sertifikat Ke Bank</th>
                                <th>Tanggal Cair</th>
                                <th>Tanggal Serah Terima Sertifikat</th>
                                <th>Pemberi Cair Dana </th>
                                <th>Penerima Cair Dana</th>
                                <th>Bank</th>
                                <th>Kasir</th>
                                <th>Update</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor Penjualan Rumah</th>
                                <th>Tanggal Akad Kredit</th>
                                <th>Tanggal Serah Sertifikat Ke Bank</th>
                                <th>Tanggal Cair</th>
                                <th>Tanggal Serah Terima Sertifikat</th>
                                <th>Pemberi Cair Dana </th>
                                <th>Penerima Cair Dana</th>
                                <th>Bank</th>
                                <th>Kasir</th>
                                <th>Update</th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($kpr as $data)
                            <tr id="{{$data->id}}">
                                <td>{{$data->jual_rumah->nomor_nota}}</td>

                                @if($data->tanggal_akad_kredit == "01-01-1970")
                                <td>Kosong</td>
                                @else
                                <td>{{$data->tanggal_akad_kredit}}</td>
                                @endif

                                 @if($data->tanggal_serah_sertifikat_bank == "01-01-1970")
                                <td>Kosong</td>
                                @else
                                <td>{{$data->tanggal_serah_sertifikat_bank}}</td>
                                @endif

                                @if($data->tanggal_cair == "01-01-1970")
                                <td>Kosong</td>
                                @else
                                <td>{{$data->tanggal_cair}}</td>
                                @endif
                                

                                @if($data->tanggal_serah_terima_sertifikat == "01-01-1970")
                                <td></td>
                                @else
                                <td>{{$data->tanggal_serah_terima_sertifikat}}</td>
                                @endif
                                
                                <td>{{$data->pemberi}}</td>
                                <td>{{$data->penerima}}</td>
                                <td>{{$data->bank->nama}}</td>
                                <td>{{$data->kasir->karyawan->nama}}</td>

                                @if($data->tanggal_serah_terima_sertifikat == "01-01-1970")
                                <td>
                                    <button class="btn btnUbah btn-primary">Update</button>
                                </td>
                                @else
                                <td>Transaksi Selesai</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="modalUpdateTanggalSerahTerimaSertifikatKpr">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Tanggal Serah Terima Sertifikat Kpr</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('updatetanggalserahterimasertifikat/ubah')}}" method="post" id="formUpdateTanggalSerahTerimaSertifikatKpr">
                                    {{csrf_field()}}
                                    <div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Akad Kredit:</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">	
										<input type="text" class="form-control tanggalakadkreditKPR" style="display:inline-block" name="tanggalakadkredit" disabled>
										<div class="input-group-addon" >
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
                                    </div>
                                    <div class="row col-lg-12">
                                        <label for="tanggal" class="col-lg-6">Tanggal Serah Sertifikat Ke Bank:</label>
                                        <div class="input-group date col-lg-6" data-provide="datepicker">	
                                        <input type="text" class="form-control tanggalserahsertifikatbankKPR" style="display:inline-block;border-style:solid" name="tanggalserahsertifikatbank" disabled >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12">
										<label for="tanggal" class="col-lg-6">Tanggal Cair KPR:</label>
										<div class="input-group date col-lg-6" data-provide="datepicker">	
										<input type="text" class="form-control tanggalcairKPR" style="display:inline-block;border-style:solid" name="tanggalcair" disabled >
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
                                    </div>
                                    
                                    <div class="row col-lg-12">
                                        <input type="hidden" id="idUbah" name="updatetanggalserahterimasertifikat">
                                        <label for="tanggal" class="col-lg-6"><b>Tanggal Serah Terima Sertifikat:</b></label>
										<div class="input-group date col-lg-6" data-provide="datepicker">	
										<input type="text" class="form-control tanggalserahterimasertifikatKPR" style="display:inline-block;border-style:solid" name="tanggalserahterimasertifikat">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
										</div>
                                    </div>
                                    <p>
                                        <label class="col-lg-6">Pemberi Cair Dana: </label>
                                        <input type="text" class="col-lg-4" id="pemberiUbahKpr" name="pemberi" placeholder="Masukkan Pemberi KPR"
                                            required disabled>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Penerima Cair Dana: </label>
                                        <input type="text" class="col-lg-4" id="penerimaUbahKpr" name="penerima" placeholder="Masukkan Penerima KPR" required disabled>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Bank: </label>
                                        <select name="bank" id="bankUbahKpr" class="col-lg-4" disabled>
                                            @foreach($bank as $data)
                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Penjualan Rumah: </label>
                                        <select id="jualrumahUbahKpr" class="col-lg-4" name="jualrumah" disabled>
                                            @foreach($jualrumah as $data)
                                            <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    {{-- <p>
                                        <label class="col-lg-6">Nomor Jual Rumah: </label>
                                    <input type="text" class="col-lg-4" id="jualrumahUbahKpr" name="jualrumah" disabled>
                                    <p> --}}
										<label class="col-lg-6">Kasir: </label>
										<select name="kasir" id="kasirUbahKpr" disabled>
										@foreach($kasir as $data)
											
												<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>
											
										@endforeach
										</select>
									</p>
                                    <p style="text-align:center">
                                        <button type="submit"  class="btn btn-success" style="text-align:center" id="btnUbahKonfirmasi" class="btn btn-primary" onclick="makeEnable()">
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

                <div class="modal fade" id="modalHapusCicilan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <form id="hapus-form" action="{{ url('kpr/hapus') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="kpr" id="idHapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahKpr">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data KPR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('kpr/tambah')}}" method="post" id="formTambahKpr">
                        {{csrf_field()}}
                         <p>
										<label for="tanggalcairkpr" class="col-lg-4">Tanggal Cair KPR:</label>
										<input type="date" id="tanggalcairTambahKpr" name="tanggalcair" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalcairkpr">
									</p>
                                     <p>
										<label for="tanggalakadkreditkpr" class="col-lg-4">Tanggal Akad Kredit KPR:</label>
										<input type="date" id="tanggalakadkreditTambahKpr" name="tanggalakadkredit" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalakadkreditkpr">
									</p>
                                    <p>
										<label for="tanggalserahterimasertifikatkpr" class="col-lg-4">Tanggal Serah Terima Sertifikat Rumah:</label>
										<input type="date" id="tanggalserahterimasertifikatTambahKpr" name="tanggalserahterimasertifikat" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
										    data-date-format="dd-mm-yyyy" data-date-viewmode="years" required>
										<input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalserahterimasertifikatkpr">
									</p>
                                    <p>
                                        <label class="col-lg-6">Pemberi: </label>
                                        <input type="text" class="col-lg-4" id="pemberiTambahKpr" name="pemberi" placeholder="Masukkan Pemberi KPR"
                                            required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Penerima: </label>
                                        <input type="text" class="col-lg-4" id="penerimaTambahKpr" name="penerima" placeholder="Masukkan Penerima KPR" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Bank: </label>
                                        <select name="bank" id="bankTambahKpr" class="col-lg-4">
                                            @foreach($bank as $data)
                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Penjualan Rumah: </label>
                                        <select name="jualrumah" id="jualrumahTambahKpr" class="col-lg-4">
                                            @foreach($jualrumah as $data)
                                            <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                   <p>
										<label class="col-lg-6">Kasir: </label>
										<select name="kasir" id="kasirUbahKpr">
										@foreach($kasir as $data)
											
												<option value="{{$data->id}}">{{$data->karyawan->nama}}</option>
											
										@endforeach
										</select>
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
         function makeEnable() {
                var x = document.getElementById('jualrumahUbahKpr');
                x.disabled = false;
            }
        $(document).ready(function () {

            // $('.btnHapus').on('click', function (e) {
            //     e.preventDefault();
            //     var id = $(this).closest('tr').attr('id');
            //     $('#idHapus').val(id);
            //     $('#modalHapusCicilan').modal('show');
            // });

            // $('.btnTambah').on('click', function (e) {
            //     e.preventDefault();
            //     $('#modalTambahCicilan').modal('show');
            // });
          

            $('.btnUbah').on('click', function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').attr('id');
                $.post("{{url('updatetanggalserahterimasertifikat/lihat')}}", {
                        'id': id,
                        '_token': "{{csrf_token()}}"
                    },
                    function (data) {
                        $('#idUbah').val(data.id);
                        $('.tanggalcairKPR').datepicker('update', data.tanggalcair); 
                        $('.tanggalakadkreditKPR').datepicker('update', data.tanggalakadkredit); 
                        $('.tanggalserahsertifikatbankKPR').datepicker('update',data.tanggalserahsertifikatbank);
                        $('.tanggalserahterimasertifikatKPR').datepicker('update', data.tanggalserahterimasertifikat);
                        $('#pemberiUbahKpr').val(data.pemberi);
                        $('#penerimaUbahKpr').val(data.penerima);
                        $('#bankUbahKpr').val(data.bank);
                        $('#jualrumahUbahKpr').val(data.jualrumah);
                        $('#kasirUbahKpr').val(data.kasir);
                    }
                );
                $('#modalUpdateTanggalSerahTerimaSertifikatKpr').modal('show');
            });

        });
    </script>

    @endsection