@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera') @section('content') @include('layouts.sidebar')

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Ubah Nota</div>

                <form action="{{url('nota/ubah')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body col-lg-12">
                        <div class="col-lg-6 pull-right">

                            <label for="tanggalbuat" class="col-lg-4">Tanggal Buat</label>
                            <input type="date" id="tanggalbuat" name="tanggalbuat" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
                                data-date-format="dd-mm-yyyy" data-date-viewmode="years" required disabled>
                            <input type="hidden" value="{{date('Y-m-d')}}" name="ambiltanggalbuat">

                            <span class="fa fa-calendar"></span>
                            <label for="tanggalserahterima" class="col-lg-4">Tanggal Serah Terima</label>
                            <input type="date" id="tanggalserahterima" name="tanggalserahterima" class="col-lg-6" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
                                data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <span class="fa fa-calendar"></span>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-8">
                                <label> Cek Berkas </label>
                                <br>
                                @foreach($berkas as $berkasberkas)
                                <div class="row">
                                    <div class="col-sm">
                                        @foreach($cekberkas as $cekcekberkas)
                                            @if($cekcekberkas->berkas_id == $berkasberkas->id)
                                               <input type="checkbox" name="berkas[]" value="{{$berkasberkas->id}}" checked>{{$berkasberkas->nama}} 
                                            @else
                                                <input type="checkbox" name="berkas[]" value="{{$berkasberkas->id}}">{{$berkasberkas->nama}}
                                            @endif

                                        @endforeach
                                       
                                    </div>
                                </div>
                                @endforeach


                            </div>
                            <br>
                            <label class="col-lg-4" for="keterangan">Keterangan</label>
                            <input class="col-lg-4" type="text" id="keterangan" name="keterangan" value="{{$nota->keterangan}}">
                        </div>
                        <div class="col-lg-6 pull-left">

                            <label class="col-lg-4" for="pemasok">Nama Customer</label>
                            <select class="col-lg-4" name="customer" id="customer">
                                @foreach($customer as $customer) 
                                    @if($customer->id == $nota->customer_id)
                                        <option value="{{$customer->id}}" selected>{{$customer->nama}}</option>
                                    @else
                                        <option value="{{$customer->id}}">{{$customer->nama}}</option>
                                    @endif 
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <br>
                            <label class="col-lg-4" for="nomornota">Nomor Nota</label>
                            <input class="col-lg-4" type="number" id="nomornota" name="nomornota" value="{{$nota->nomor}}" required>
                            <label class="col-lg-4" for="total">Total</label>
                            <input class="col-lg-4" type="number" id="total" name="total" value="{{$nota->total}}" required> {{--
                            <label class="col-lg-4" for="rumah">Rumah</label>
                            <select class="col-lg-4" name="rumah" id="rumah">
                                @foreach($rumah as $rumah)
                                <option value="{{$rumah->id}}">{{$rumah->tipe->blok}} - {{$rumah->nomor}}</option>
                                @endforeach
                            </select> --}}
                            <label class="col-lg-4" for="rumah">Rumah</label>
                            <select class="col-lg-4" name="rumah" id="rumah">
                                @foreach($rumah as $rumah)
                                    @if($rumah->id == $nota->rumah_id)
                                        <option value="{{$rumah->id}}" selected>{{$rumah->tipe->blok}}-{{$rumah->nomor}}
                                    @else
                                        <option value="{{$rumah->id}}">{{$rumah->tipe->blok}}-{{$rumah->nomor}}
                                    @endif
                              </option>
                                @endforeach
                            </select>
                            <br>

                            <h3>Mengetahui</h3>
                            <label class="col-lg-4" for="marketing">Marketing</label>
                            <select class="col-lg-4" name="marketing" id="marketing">
                                @foreach($marketing as $marketing)
                                    @if($marketing->id == $nota->marketing_id)
                                        <option value="{{$marketing->id}}" selected>{{$marketing->nama}}</option>
                                    @else
                                        <option value="{{$marketing->id}}">{{$marketing->nama}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <label class="col-lg-4" for="kasir">Kasir</label>
                            <select class="col-lg-4" name="kasir" id="kasir">
                                @foreach($kasir as $kasir)
                                    @if($kasir->id == $nota->kasir_id)
                                        <option value="{{$kasir->id}}" selected>{{$kasir->nama}}</option>
                                    @else
                                        <option value="{{$kasir->id}}">{{$kasir->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <br>

                        </div>
                    </div>
                    <div class="text-center">
                        <button style="display:inline-block" class="btn btn-success" id="btnSimpan">Ubah Nota</button>
                    </div>
                </form>
                <br>
                <br>


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