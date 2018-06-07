@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')
<!-- Example DataTables Card-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Tipe</div>
            <div class="card-body">

                @include('layouts.flash')

                <div class="pull-right" style="padding-bottom:20px">
                    <button class="btn btnTambah btn-success" data-toggle="modal" data-target="#modalTambahTipe">
                        <i class="fa fa-plus"></i> Tambah Tipe
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jalan</th>
                                <th>Blok</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>Kamar Tidur</th>
                                <th>Kamar Mandi</th>
                                <th>Listrik</th>
                                <th>Harga Asli</th>
                                <th>Harga Jual</th>
                                <th>Uang Muka</th>
                                <th>Deskripsi</th>
                                <th>Lainnya</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Jalan</th>
                                <th>Blok</th>
                                <th>Luas Tanah</th>
                                <th>Luas Bangunan</th>
                                <th>Kamar Tidur</th>
                                <th>Kamar Mandi</th>
                                <th>Listrik</th>
                                <th>Harga Asli</th>
                                <th>Harga Jual</th>
                                <th>Uang Muka</th>
                                <th>Deskripsi</th>
                                <th>Lainnya</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($tipe as $data)
                            <tr id="{{$data->id}}">
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jalan}}</td>
                                <td>{{$data->blok}}</td>
                                <td>{{number_format( $data->luas_tanah, 0 , '' , '.' )}}</td>
                                <td>{{$data->luas_bangunan}}</td>
                                <td>{{$data->kamar_tidur}}</td>
                                <td>{{$data->kamar_mandi}}</td>
                                <td>{{number_format( $data->listrik, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->harga_asli, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->harga_jual, 0 , '' , '.' )}}</td>
                                <td>Rp {{number_format( $data->uang_muka, 0 , '' , '.' )}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td>{{$data->lainnya}}</td>
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

                <div class="modal fade" id="modalUbahTipe">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Tipe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('tipe/ubah')}}" method="post" id="formUbahTipe" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <p>
                                        <input type="hidden" id="idUbah" name="tipe">
                                        <label class="col-lg-6">Nama: </label>
                                        <input type="text" class="col-lg-4" id="namaUbahTipe" name="nama" placeholder="Masukkan Nama Tipe" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Jalan: </label>
                                        <input type="text" class="col-lg-4" id="jalanUbahTipe" name="jalan" placeholder="Masukkan Jalan Tipe" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Blok: </label>
                                        <input type="text" class="col-lg-4" id="blokUbahTipe" name="blok" placeholder="Masukkan Blok Tipe" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Luas Tanah: </label>
                                        <input type="number" class="col-lg-4" id="luastanahUbahTipe" name="luastanah" placeholder="Masukkan Luas Tanah" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Luas Bangunan: </label>
                                        <input type="number" class="col-lg-4" id="luasbangunanUbahTipe" name="luasbangunan" placeholder="Masukkan Luas Bangunan"
                                            required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Kamar Tidur: </label>
                                        <input type="number" class="col-lg-4" id="kamartidurUbahTipe" name="kamartidur" placeholder="Masukkan Jumlah Kamar Tidur"
                                            required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Kamar Mandi: </label>
                                        <input type="number" class="col-lg-4" id="kamarmandiUbahTipe" name="kamarmandi" placeholder="Masukkan Jumlah Kamar Mandi"
                                            required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Listrik: </label>
                                        <input type="number" class="col-lg-4" id="listrikUbahTipe" name="listrik" placeholder="Masukkan Jumlah Listrik" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Harga Asli: </label>
                                        <input type="number" class="col-lg-4" id="hargaasliUbahTipe" name="hargaasli" placeholder="Masukkan Harga Asli" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Harga Jual: </label>
                                        <input type="number" class="col-lg-4" id="hargajualUbahTipe" name="hargajual" placeholder="Masukkan Harga Jual" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Uang Muka: </label>
                                        <input type="number" class="col-lg-4" id="uangmukaUbahTipe" name="uangmuka" placeholder="Masukkan Uang Muka Tipe" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Deskripsi: </label>
                                        <input type="text" class="col-lg-4" id="deskripsiUbahTipe" name="deskripsi" placeholder="Masukkan Deskripsi Tipe" required>
                                    </p>
                                    <p>
                                        <label class="col-lg-6">Keterangan Lainnya: </label>
                                        <input type="text" class="col-lg-4" id="lainnyaUbahTipe" name="lainnya" placeholder="Masukkan Keterangan Lainnya">
                                    </p>
                                    <p>
                                        <label class="col-lg-4">Gambar Denah: </label>
                                        <input type="file" class="col-lg-7" id="gambardenahUbahTipe" name="gambardenah" placeholder="Masukkan Gambar Denah">
                                        <img style="width:100% ; height:auto " id="gambarDenah" >
                                    </p>
                                    <p>
                                        <label class="col-lg-4">Gambar Rumah: </label>
                                        <input type="file" class="col-lg-7" id="gambarrumahUbahTipe" name="gambarrumah" placeholder="Masukkan Gambar Rumah">
                                        <img style="width:100% ; height:auto " id="gambarRumah" >
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

                <div class="modal fade" id="modalHapusTipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <form id="hapus-form" action="{{ url('tipe/hapus') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="tipe" id="idHapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahTipe">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Tipe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('tipe/tambah')}}" method="post" id="formTambahTipe" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <p>
                            <input type="hidden" id="idUbah" name="tipe">
                            <label class="col-lg-6">Nama: </label>
                            <input type="text" class="col-lg-4" id="namaTambahTipe" name="nama" placeholder="Masukkan Nama Tipe" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Jalan: </label>
                            <input type="text" class="col-lg-4" id="kotaTambahTipe" name="jalan" placeholder="Masukkan Jalan Tipe" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Blok: </label>
                            <input type="text" class="col-lg-4" id="blokTambahTipe" name="blok" placeholder="Masukkan Blok Tipe" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Luas Tanah: </label>
                            <input type="number" class="col-lg-4" id="luastanahTambahTipe" name="luastanah" placeholder="Masukkan Luas Tanah" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Luas Bangunan: </label>
                            <input type="number" class="col-lg-4" id="luasbangunanTambahTipe" name="luasbangunan" placeholder="Masukkan Luas Bangunan"
                                required>
                        </p>
                        <p>
                            <label class="col-lg-6">Kamar Tidur: </label>
                            <input type="number" class="col-lg-4" id="kamartidurTambahTipe" name="kamartidur" placeholder="Masukkan Jumlah Kamar Tidur"
                                required>
                        </p>
                        <p>
                            <label class="col-lg-6">Kamar Mandi: </label>
                            <input type="number" class="col-lg-4" id="kamarmandiTambahTipe" name="kamarmandi" placeholder="Masukkan Jumlah Kamar Mandi"
                                required>
                        </p>
                        <p>
                            <label class="col-lg-6">Listrik: </label>
                            <input type="number" class="col-lg-4" id="listrikTambahTipe" name="listrik" placeholder="Masukkan Jumlah Listrik" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Harga Asli: </label>
                            <input type="number" class="col-lg-4" id="hargaasliTambahTipe" name="hargaasli" placeholder="Masukkan Harga Asli" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Harga Jual: </label>
                            <input type="number" class="col-lg-4" id="hargajualTambahTipe" name="hargajual" placeholder="Masukkan Harga Jual" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Uang Muka: </label>
                            <input type="number" class="col-lg-4" id="uangmukaTambahTipe" name="uangmuka" placeholder="Masukkan Uang Muka Tipe" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Deskripsi: </label>
                            <input type="text" class="col-lg-4" id="deskripsiTambahTipe" name="deskripsi" placeholder="Masukkan Deskripsi Tipe" required>
                        </p>
                        <p>
                            <label class="col-lg-6">Keterangan Lainnya: </label>
                            <input type="text" class="col-lg-4" id="lainnyaTambahTipe" name="lainnya" placeholder="Masukkan Keterangan Lainnya Tipe">
                        </p>
                        <p>
                            <label class="col-lg-4">Gambar Denah: </label>
                            <input type="file" class="col-lg-7" id="gambardenahTambahTipe" name="gambardenah" placeholder="Masukkan Gambar Denah">
                            <img style="width:100% ; height:auto " id="gambardenah">
                        </p>
                        <p>
                            <label class="col-lg-4">Gambar Rumah: </label>
                            <input type="file" class="col-lg-7" id="gambarrumahTambahTipe" name="gambarrumah" placeholder="Masukkan Gambar Rumah">
                            <img style="width:100% ; height:auto " id="gambarrumah">
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
                $('#modalHapusTipe').modal('show');
            });

            $('.btnTambah').on('click', function (e) {
                e.preventDefault();
                $('#modalTambahTipe').modal('show');
            });

            $('.btnUbah').on('click', function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').attr('id');
                $.post("{{url('tipe/lihat')}}", {
                        'id': id,
                        '_token': "{{csrf_token()}}"
                    },
                    function (data) {
                        $('#idUbah').val(data.id);
                        $('#namaUbahTipe').val(data.nama);
                        $('#jalanUbahTipe').val(data.jalan);
                        $('#blokUbahTipe').val(data.blok);
                        $('#luastanahUbahTipe').val(data.luastanah);
                        $('#luasbangunanUbahTipe').val(data.luasbangunan);
                        $('#kamartidurUbahTipe').val(data.kamartidur);
                        $('#kamarmandiUbahTipe').val(data.kamarmandi);
                        $('#listrikUbahTipe').val(data.listrik);
                        $('#hargaasliUbahTipe').val(data.hargaasli);
                        $('#hargajualUbahTipe').val(data.hargajual);
                        $('#uangmukaUbahTipe').val(data.uangmuka);
                        $('#deskripsiUbahTipe').val(data.deskripsi);
                        $('#lainnyaUbahTipe').val(data.lainnya);
                        $("#gambarDenah").attr('src', 'images/'+ data.gambardenah);
                        $("#gambarRumah").attr('src', 'images/'+ data.gambarrumah);
                    }
                );
                $('#modalUbahTipe').modal('show');
            });

        });
    </script>

    @endsection