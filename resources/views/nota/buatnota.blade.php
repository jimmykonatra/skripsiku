@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') 

@include('layouts.sidebar')
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Buat Nota</div>

                    <form action="{{url('nota/store')}}" method="post">
                <div class="card-body col-lg-12">
                    <div class="col-lg-6 pull-right">
                        <label for="tanggalbuat" class="col-lg-4">Tanggal Buat</label>
                        <input type="date" id="tanggalbuat" name="tanggalbuat" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
                            data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
                        <span class="fa fa-calendar"></span>
                        <label for="jatuhtempo" class="col-lg-4">Tanggal Serah Terima</label>
                        <input type="date" id="jatuhtempo" name="jatuhtempo" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years">
                        <span class="fa fa-calendar"></span>
                        <br>
                        <br>
                        <br>
                        <div class="col-lg-8">
                            <label> Cek Berkas </label>
                            <br>
                            <div class="row">

                                <div class="col-sm">
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas A
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas B
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas C
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas D
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas E
                                    <br>
                                </div>

                                <div class="col-sm">
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas F
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas G
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas H
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas I
                                    <br>
                                    <br>
                                    <input type="checkbox" name="berkas" value="berkasA">Berkas J
                                    <br>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 pull-left">
                        
                            <label class="col-lg-4" for="pemasok">Nama Customer</label>
                            <select class="col-lg-4" name="customer" id="customer">
                                @foreach($customer as $customer)
                                <option value="{{$customer->id}}">{{$customer->nama}}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <br>
                            <label class="col-lg-4" for="nomornota">Nomor Nota</label>
                            <input class="col-lg-4" type="number" id="nomornota" name="nomornota" required>
                            <label class="col-lg-4" for="total">Total</label>
                            <input class="col-lg-4" type="number" id="total" name="total" required>


                            {{--  <label class="col-lg-4" for="rumah">Rumah</label>
                            <select class="col-lg-4" name="rumah" id="rumah">
                                @foreach($rumah as $rumah)
                                <option value="{{$rumah->id}}">{{$rumah->tipe->blok}} - {{$rumah->nomor}}</option>
                                @endforeach
                            </select>  --}}
                             <label class="col-lg-4" for="rumah">Rumah</label>
                            <input class="col-lg-4" type="text" id="rumah" name="rumah" required>
                       
                    </div>
                </div>
                </form>
                <br><br>
                <div class="col-lg-12 text-center">
                    <button style="display:inline-block" class="btn btn-success" id="btnSimpan">Simpan Nota</button>
                </div>
                
                <br>
                <br>
            </div>
        </div>

        <br>
        <br>
    </div>

    <!--Footer -->
    @include('layouts.footer')

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!--Script-->
    @include('layouts.footer')
    <script>
        $(document).ready(function () {
            var total = 0;
            var duplicate = 0;
            var rowIndex = 0;

            $('#jatuhtempo').on('change', function (e) { //prevent end date less than start date
                var tanggalbuat = $('#tanggalbuat').val();
                var jatuhtempo = $('#jatuhtempo').val();

                if (jatuhtempo < tanggalbuat) {
                    $('#jatuhtempo').val(tanggalbuat);
                }
            });

        });
    </script>
    </div>
</body>
@endsection