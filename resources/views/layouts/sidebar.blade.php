<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href={{( 'beranda')}}>Sumber Langgeng Sejahtera</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item {{Request::is('beranda*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href={{( 'beranda')}}>
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Beranda</span>
        </a>
      </li>
      <li class="nav-item {{Request::is('tentangkami*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href={{( 'tentangkami')}}>
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

          <li class="{{Request::is('updatetanggalcair')  ? 'active' : '' }}">
            <a href={{url('updatetanggalcair')}}>Update Tanggal Cair KPR</a>
          </li>
          <li class="{{Request::is('updatetanggalakadkredit')  ? 'active' : '' }}">
            <a href={{url('updatetanggalakadkredit')}}>Update Akad Kredit</a>
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
            <a href={{url('updatetanggalcairdana')}}>Update Tanggal Cair</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>

    </ul>
  </div>
</nav>