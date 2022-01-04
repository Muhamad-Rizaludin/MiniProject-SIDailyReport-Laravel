<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          @if (Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a href="/dashboard/karyawan" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Dosen dan Karyawan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/jabatan" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>Jabatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/jobdesk" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>Jobdesk</p>
            </a>
          </li>
          @endif

          @if (Auth::user()->hasRole('karyawan'))
          <li class="nav-item">
            <a href="/dashboard/buatreport" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>Input Daily Report</p>
            </a>
          </li>
          @endif

          @if (Auth::user()->hasRole('spmi|pimpinan'))
          <li class="nav-item">
            <a href="/dashboard/report" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>Hasil Report</p>
            </a>
          </li>
          @endif
          
        </ul>
</nav>