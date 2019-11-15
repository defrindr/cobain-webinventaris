    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li>
              <a href="{{ route('peminjaman.index') }}">
                <i class="fa fa-bitcoin"></i>
                <span>Peminjaman</span>
              </a>
            </li>
            @if(\App\Helpers\MyHelper::isAdmin())
              <li>
                <a href="{{ route('jenis.index') }}">
                  <i class="fa fa-dashboard"></i>
                  <span>Jenis</span>
                </a>
              </li>
              <li>
                <a href="{{ route('ruang.index') }}">
                  <i class="fa fa-car"></i>
                  <span>Ruang</span>
                </a>
              </li>
              <li>
                <a href="{{ route('inventaris.index') }}">
                  <i class="fa fa-bitcoin"></i>
                  <span>Inventaris</span>
                </a>
              </li>
              
              <li class="treeview menu-close">
                <a href="#">
                  <i class="fa fa-dashboard"></i>
                  <span>User Management</span>
                  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="{{ route('petugas.index') }}">
                      <i class="fa fa-user"></i>
                      <span>Petugas</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('pegawai.index') }}">
                      <i class="fa fa-user"></i>
                      <span>Pegawai</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('level.index') }}">
                      <i class="fa fa-user-secret"></i>
                      <span>Level</span>
                    </a>
                  </li>
                @else
                  <li>
                    <form action="/admin-logout" method="post"> @csrf @method("POST") <button class="btn btn-danger text-white" style="margin:10px;width: 90%;">Logout</button></form>
                  </li>
                @endif
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
