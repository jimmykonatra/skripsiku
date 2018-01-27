<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Sumber Langgeng Sejahtera</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item {{Request::is('beranda*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href={{('beranda')}}>
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>
        <li class="nav-item {{Request::is('tentangkami*') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href={{('tentangkami')}}>
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Tentang Kami</span>
          </a>
        </li>
        <li class="nav-item {{Request::is('karyawan') || Request::is('customer') ||  Request::is('bank') ||  Request::is('tipe') ||  Request::is('rumah') ||  Request::is('perumahan') ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Data</span>
          </a>
        </li>
          <ul class="sidenav-second-level collapse text-center" id="collapseComponents">
            <li class="{{Request::is('karyawan')  ? 'active' : '' }}">
              <a href={{url('karyawan')}}>Karyawan</a>
            </li>
            <li class="{{Request::is('customer')  ? 'active' : '' }}">
              <a href={{url('customer')}}>Customer</a>
            </li>
             <li class="{{Request::is('bank')  ? 'active' : '' }}">
              <a href={{url('bank')}}>Bank</a>
            </li>
             <li>
              <a href="tipe.html">Tipe</a>
            </li>
             <li>
              <a href="rumah.html">Rumah</a>
            </li>
             <li>
              <a href="perumahan.html">Perumahan</a>
            </li>
             <li>
              <a href="spesifikasi.html">Spesikasi</a>
            </li>
             <li>
              <a href="pengeluaran.html">Pengeluaran</a>
            </li>
             <li>
              <a href="jenispengeluaran.html">Jenis Pengeluaran</a>
            </li>
          </ul>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <li class="nav-item">
					<i class="fa fa-fw fa-sign-out"></i>Logout</a>
			    </li>
        </li>
      </ul>
    </div>
  </nav>