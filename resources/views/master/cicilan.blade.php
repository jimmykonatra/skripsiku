@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Cicilan</div>
            <div class="card-body">

                @include('layouts.flash')

                <div class="pull-right" style="padding-bottom:20px">
                    <button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahCicilan">
                        <i class="fa fa-plus"></i> Tambah Cicilan
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Bank</th>
                                <th>Lama Cicilan</th>
                                <th>Nominal</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tipe</th>
                                <th>Bank</th>
                                <th>Lama Cicilan</th>
                                <th>Nominal</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($cicilan as $cicilan)
                            <tr id="{{$cicilan->id}}">
                                <td>{{$cicilan->tipe->nama}}</td>
                                <td>{{$cicilan->bank->nama}}</td>
                                <td>{{$cicilan->lama_cicilan}}</td>
                                <td>{{$cicilan->nominal}}</td>
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

                <div class="modal fade" id="modalUbahCicilan">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Cicilan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('cicilan/ubah')}}" method="post" id="formUbahCicilan">
                                    {{csrf_field()}}
                                    <p>
                                        <input type="hidden" id="idUbah" name="cicilan">
                                        <label class="col-lg-6">Tipe: </label>
                                        <input type="text" class="col-lg-4" id="tipeUbahCicilan" name="tipe" placeholder="Masukkan Tipe Rumah" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Bank: </label>
                                        <input type="text" class="col-lg-4" id="bankUbahCicilan" name="bank" placeholder="Masukkan Bank" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Lama Cicilan: </label>
                                        <input type="number" class="col-lg-4" id="lamacicilanUbahCicilan" name="lamacicilan" placeholder="Masukkan Lama Cicilan"
                                            required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Nominal: </label>
                                        <input type="number" class="col-lg-4" id="nominalUbahCicilan" name="nominal" placeholder="Masukkan Nominal Cicilan" required>
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

                                <form id="hapus-form" action="{{ url('cicilan/hapus') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="cicilan" id="idHapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahCicilan">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Cicilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('cicilan/tambah')}}" method="post" id="formTambahCicilan">
                        {{csrf_field()}}
                        <p>
                            <input type="hidden" id="idTambah" name="cicilan">
                            <label class="col-lg-6">Tipe: </label>
                            <select name="tipe" id="tipeTambahCicilan" class="col-lg-4">
                                @foreach($tipe as $datatipe)
                                <option value="{{$datatipe->id}}">{{$datatipe->nama}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label class="col-lg-6">Tipe: </label>
                            <select name="bank" id="bankTambahCicilan" class="col-lg-4">
                                @foreach($bank as $databank)
                                <option value="{{$databank->id}}">{{$databank->nama}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label class="col-lg-6">Lama Cicilan: </label>
                            <input type="number" class="col-lg-4" id="lamacicilanlTambahCicilan" name="lamacicilan" placeholder="Masukkan Lama Cicilan"
                                required>
                        </p>
                        <p>
                            <label class="col-lg-6">Nominal: </label>
                            <input type="number" class="col-lg-4" id="nominallTambahCicilan" name="nominal" placeholder="Masukkan Nominal Cicilan" required>
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
                $('#modalHapusCicilan').modal('show');
            });

            $('.btnTambah').on('click', function (e) {
                e.preventDefault();
                $('#modalTambahCicilan').modal('show');
            });

            $('.btnUbah').on('click', function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').attr('id');
                $.post("{{url('cicilan/lihat')}}", {
                        'id': id,
                        '_token': "{{csrf_token()}}"
                    },
                    function (data) {
                        $('#idUbah').val(data.id);
                        $('#tipeUbahCicilan').val(data.tipe);
                        $('#bankUbahCicilan').val(data.bank);
                        $('#lamacicilanUbahCicilan').val(data.lamacicilan);
                        $('#nominalUbahCicilan').val(data.nominal);
                    }
                );
                $('#modalUbahCicilan').modal('show');
            });

        });
    </script>

    @endsection