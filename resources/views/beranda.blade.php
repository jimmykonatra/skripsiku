@extends('layouts.master') @section('title', 'Sumber Langgeng Sejahtera')

@section('content')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class=""><b>My Dashboard</b></li>
      </ol>
			<!-- Icon Cards-->
			<label><b>Proses KPR</b></label>
      <div class="row">
        <div class="col-xl-2 col-sm-6 mb-3">
					<div class="card text-white bg-primary o-hidden w-100 h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw  fa-money"></i>
              </div>
            <div class="mr-5"><h1>{{$pengeluaran}}</h1> Pengeluaran Masih Hutang</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="{{url('pengeluaran')}}">
							<span class="float-left">Lihat</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
        <div class="col-xl-2 col-sm-6 mb-3">
					<div class="card text-white bg-warning o-hidden w-100 h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-users"></i>
							</div>
            <div class="mr-5"><h1>{{$jualrumahdp}}</h1> Transaksi Belum Lunas Uang Muka</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="{{url('jualrumah')}}">
							<span class="float-left">Lihat</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
        <div class="col-xl-2 col-sm-6 mb-3">
					<div class="card text-white bg-success o-hidden w-100 h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-truck"></i>
							</div>
            <div class="mr-5"><h1>{{$jualrumahkpr}}</h1> Transaksi Dalam Proses KPR</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="{{url('jualrumah')}}">
							<span class="float-left">Lihat</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
        <div class="col-xl-2 col-sm-6 mb-3">
					<div class="card text-white bg-secondary o-hidden w-100 h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-shopping-bag"></i>
							</div>
            <div class="mr-5"><h1>{{$jualrumahbelumlengkap}}</h1> Transaksi Tidak Lengkap Pemberkasan</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="{{url('jualrumah')}}">
							<span class="float-left">Lihat</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
      
      {{-- Script --}}
      <a class="scroll-to-top rounded" href="#page-top">
				<i class="fa fa-angle-up"></i>
      </a>
      @include('layouts.footer')
      <script>
				$('.col-xl-2').hover(function () {
					$(this).removeClass('col-xl-2').addClass('col-xl-3');
				}, function () {
					$(this).removeClass('col-xl-3').addClass('col-xl-2');
				});
      </script>
    </div>
@endsection
