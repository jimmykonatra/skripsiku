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
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
					<div class="card text-white bg-primary o-hidden w-100 h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-user-md"></i>
              </div>
            <div class="mr-5">{{$pengeluaran}} Pengeluaran Masih Hutang</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="{{url('karyawan')}}">
							<span class="float-left">Lihat</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
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
