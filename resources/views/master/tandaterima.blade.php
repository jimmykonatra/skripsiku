@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
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
                                <th>Booking Fee</th>
                                <th>Dana KPR</th>
                                <th>Angsuran</th>
                                <th>Uang Tambahan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Kasir</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nomor Penjualan</th>
                                <th>Booking Fee</th>
                                <th>Dana KPR</th>
                                <th>Angsuran</th>
                                <th>Uang Tambahan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th>Kasir</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($tandaterima as $data)
                            <tr id="{{$data->id}}">
                                <td>{{$data->jual_rumah->nomor_nota}}</td>
                                <td>{{$data->booking_fee}}</td>
                                <td>{{$data->dana_kpr}}</td>
                                <td>{{$data->angsuran}}</td>
                                <td>{{$data->uang_tambahan}}</td>
                                <td>{{$data->total}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>{{$data->kasir->karyawan->nama}}</td>
                                <td>
                                    <button class="btn btnUbah btn-primary">Ubah</button>
                                </td>
                                <td>
                                    <button class="btn btnHapus btn-danger">Hapus</button>
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
                                    <p>
                                        <input type="hidden" id="idUbah" name="tandaterima">
                                        <label class="col-lg-6">Nomor Penjualan: </label>
                                        <select name="nomornota" id="nomornotaUbahTandaTerima">
                                            @foreach($jualrumah as $data)
                                            <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Booking Fee: </label>
                                        <input type="number" class="col-lg-4" id="bookingfeeUbahTandaTerima" name="bookingfee" placeholder="Masukkan Booking Fee">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Dana KPR: </label>
                                        <input type="number" class="col-lg-4" id="danakprUbahTandaTerima" name="danakpr" placeholder="Masukkan Dana KPR">
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Angsuran: </label>
                                        <input type="number" class="col-lg-4" id="angsuranUbahTandaTerima" name="angsuran" placeholder="Masukkan Angsuran">
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
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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
        <div class="modal-dialog" role="document">
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
                        <p>
                            <input type="hidden" id="idTambah" name="tandaterima">
                            <label class="col-lg-6">Nomor Penjualan: </label>
                            <select name="nomornota" id="nomornotaTambahTandaTerima">
                                @foreach($jualrumah as $data)
                                <option value="{{$data->id}}">{{$data->nomor_nota}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label class="col-lg-6">Booking Fee: </label>
                            <input type="number" class="col-lg-4" id="bookingfeeTambahTandaTerima" name="bookingfee" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Dana KPR: </label>
                            <input type="number" class="col-lg-4" id="danakprTambahTandaTerima" name="danakpr" value="0">
                        </p>
                        <p>
                            <label class="col-lg-6">Angsuran: </label>
                            <input type="number" class="col-lg-4" id="angsuranTambahTandaTerima" name="angsuran" value="0">
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

            $('.btnHapus').on('click', function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').attr('id');
                $('#idHapus').val(id);
                $('#modalHapusTandaTerima').modal('show');
            });

            $('.btnTambah').on('click', function (e) {
                e.preventDefault();
                $('#modalTambahTandaTerima').modal('show');
            });

            $('#bookingfeeTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var angsuran = parseInt($('#angsuranTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + angsuran + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#danakprTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var angsuran = parseInt($('#angsuranTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + angsuran + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#angsuranTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var angsuran = parseInt($('#angsuranTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + angsuran + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });

            $('#uangtambahanTambahTandaTerima').on('change', function (e) {
                var bookingfee = parseInt($('#bookingfeeTambahTandaTerima').val());
                var danakpr = parseInt($('#danakprTambahTandaTerima').val());
                var angsuran = parseInt($('#angsuranTambahTandaTerima').val());
                var uangtambahan = parseInt($('#uangtambahanTambahTandaTerima').val());
                var total = bookingfee + danakpr + angsuran + uangtambahan;
                $('#totalTambahTandaTerima').val(total);
            });


            $('.btnUbah').on('click', function (e) {
                e.preventDefault(); //cek submit
                var id = $(this).closest('tr').attr('id');
                $.post("{{url('tandaterima/lihat')}}", {
                        'id': id,
                        '_token': "{{csrf_token()}}"
                    },
                    function (data) {
                        $('#idUbah').val(data.id);
                        $('#nomornotaUbahTandaTerima').val(data.nomornota);
                        $('#bookingfeeUbahTandaTerima').val(data.bookingfee);
                        $('#danakprUbahTandaTerima').val(data.danakpr);
                        $('#angsuranUbahTandaTerima').val(data.angsuran);
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