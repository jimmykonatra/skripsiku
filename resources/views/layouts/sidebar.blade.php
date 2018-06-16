<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href={{( 'beranda')}}><b>Pessona WIROLEGI</b></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item {{Request::is('beranda*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href= {{url( 'beranda')}}>
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Beranda</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('tentangkami') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href={{url('tentangkami')}}>
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Tentang Kami</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('karyawan') || Request::is('customer') ||  Request::is('bank') ||  Request::is('tipe') ||  Request::is('rumah') ||  Request::is('perumahan') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Components">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-wrench"></i>
          <span class="nav-link-text">Data</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li class="{{Request::is('karyawan')  ? 'active' : '' }}">
            <a href={{url( 'karyawan')}}>Karyawan</a>
          </li>
          <li class="{{Request::is('customer')  ? 'active' : '' }}">
            <a href={{url( 'customer')}}>Customer</a>
          </li>
          <li class="{{Request::is('bank')  ? 'active' : '' }}">
            <a href={{url( 'bank')}}>Bank</a>
          </li>
          <li class="{{Request::is('jenispengeluaran')  ? 'active' : '' }}">
            <a href={{url( 'jenispengeluaran')}}>Jenis Pengeluaran</a>
          </li>
          <li class="{{Request::is('perumahan')  ? 'active' : '' }}">
            <a href={{url( 'perumahan')}}>Perumahan</a>
          </li>
          <li class="{{Request::is('pengeluaran')  ? 'active' : '' }}">
            <a href={{url( 'pengeluaran')}}>Pengeluaran</a>
          </li>
          <li class="{{Request::is('kpr')  ? 'active' : '' }}">
            <a href={{url('kpr')}}>Kpr</a>
          </li>
          <li class="{{Request::is('cicilan')  ? 'active' : '' }}">
            <a href={{url( 'cicilan')}}>Cicilan</a>
          </li>
          <li class="{{Request::is('rumah')  ? 'active' : '' }}">
            <a href={{url('rumah')}}>Rumah</a>
          </li>
          <li class="{{Request::is('tipe')  ? 'active' : '' }}">
            <a href={{url('tipe')}}>Tipe</a>
          </li>
          <li class="{{Request::is('berkas')  ? 'active' : '' }}">
            <a href={{url('berkas')}}>Berkas</a>
          </li>
          <li class="{{Request::is('tandaterima')  ? 'active' : '' }}">
            <a href={{url('tandaterima')}}>Tanda Terima</a>
          </li>
          <li class="{{Request::is('pencairandana')  ? 'active' : '' }}">
            <a href={{url('pencairandana')}}>Pencairan Dana</a>
          </li>
        </ul>
      </li>
    </li>

    <li class="nav-item {{Request::is('karyawan') || Request::is('customer') ||  Request::is('bank') ||  Request::is('tipe') ||  Request::is('rumah') ||  Request::is('perumahan') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Components">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseKPR" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-wrench"></i>
          <span class="nav-link-text">KPR</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseKPR">

          <li class="{{Request::is('updatetanggalakadkredit')  ? 'active' : '' }}">
            <a href={{url('updatetanggalakadkredit')}}>Update Akad Kredit</a>
          </li>
          <li class="{{Request::is('updatetanggalcair')  ? 'active' : '' }}">
            <a href={{url('updatetanggalcair')}}>Update Tanggal Cair KPR</a>
          </li>
          <li class="{{Request::is('updatetanggalserahterimasertifikat')  ? 'active' : '' }}">
            <a href={{url('updatetanggalserahterimasertifikat')}}>Update Tanggal Serah Terima Sertifikat</a>
          </li>
        </ul>
      </li>
    </li>
      <li class="nav-item  {{ Request::is('jualrumah') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Nota">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseJualRumah" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-file"></i>
          <span class="nav-link-text">Transaksi</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseJualRumah">
          <li class="{{Request::is('jualrumah')  ? 'active' : '' }}">
            <a href={{url('jualrumah')}}>Jual Rumah</a>
          </li>
          <li class="{{Request::is('updatetanggalcairdana')  ? 'active' : '' }}">
            <a href={{url('updatetanggalcairdana')}}>Serah Terima Rumah</a>
          </li>
        </ul>
      </li>
      {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
      </li> --}}
    </ul>
    <ul class="navbar-nav ml-auto">
      {{-- <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>        
      </ul> --}}
			<li class="nav-item">
				<span class="nav-link">
          @if(isset(Auth::user()->karyawan->nama))
            <h5 style="color: white">Selamat Datang, {{Auth::user()->karyawan->nama}}</h5>
            @else
        <form action="{{ route('login')}}"></form>
          @endif
				</span>
			</li>
			<li class="nav-item">
				<a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fa fa-fw fa-sign-out"></i>Logout</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>
		</ul>
  </div>
</nav>