<!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->

          <!--begin::End Navbar Links-->
         <ul class="navbar-nav ms-auto">
              <!--begin::Fullscreen Toggle-->
              <li class="nav-item">
                  <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                      <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                      <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                  </a>
              </li>
              <!--end::Fullscreen Toggle-->

              <!--begin::User Menu Dropdown-->
              <li class="nav-item dropdown user-menu">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <i class="bi bi-person-circle"></i>
                      <span class="d-none d-md-inline">Akun</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                          <a href="#" class="dropdown-item">
                              <i class="bi bi-person"></i> Profil
                          </a>
                      </li>
                      <li><hr class="dropdown-divider"></li>

                      <livewire:auth.logout />
                  </ul>
              </li>
              <!--end::User Menu Dropdown-->
          </ul>


          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('adminlte/dist/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Broddyfae</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
       <div class="sidebar-wrapper bg-dark text-light min-vh-100">
    <nav class="mt-3">
        <ul class="nav flex-column px-2" id="navigation" role="navigation" aria-label="Main navigation">

            <!-- Header -->
            <li class="nav-header text-uppercase fw-bold text-secondary small mb-2 ps-3">
                <i class="bi bi-grid me-2"></i> Menu Utama
            </li>

            <!-- Dashboard -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Logo -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.logo.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.logo.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-card-image"></i>
                    <span>Logo</span>
                </a>
            </li>

            <!-- Utama -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.utama.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.utama.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-columns"></i>
                    <span>Halaman Utama</span>
                </a>
            </li>

            <!-- Info -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.info.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.info.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-person-vcard-fill"></i>
                    <span>Info</span>
                </a>
            </li>

            <!-- Film -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.film.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.film.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-youtube"></i>
                    <span>Film</span>
                </a>
            </li>

            <!-- Musik -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.musik.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.musik.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-music-note-beamed"></i>
                    <span>Musik</span>
                </a>
            </li>

            <!-- Merch -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.merch.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.merch.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-basket"></i>
                    <span>Merch</span>
                </a>
            </li>

            <!-- Collab -->
            <li class="nav-item mb-1">
                <a href="{{ route('admin.collab.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.collab.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Collab</span>
                </a>
            </li>

            <!-- Show -->
            <li class="nav-item mb-3">
                <a href="{{ route('admin.show.index') }}" 
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 
                   {{ request()->routeIs('admin.show.*') ? 'bg-primary text-white shadow-sm' : 'text-light hover-bg-light' }}">
                    <i class="bi bi-ticket-detailed"></i>
                    <span>Show</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="border-top my-3"></li>

            <!-- Auth -->
            <li class="nav-header text-uppercase fw-bold text-secondary small mb-2 ps-3">
                <i class="bi bi-lock-fill me-2"></i> Pengaturan
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 py-2 px-3 rounded-3 text-light hover-bg-light collapsed" 
                   data-bs-toggle="collapse" href="#authMenu" role="button" aria-expanded="false" aria-controls="authMenu">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Auth</span>
                    <i class="ms-auto bi bi-chevron-down small"></i>
                </a>
                <ul class="collapse ps-4 mt-1" id="authMenu">
                    <li>
                        <a href="{{ route('admin.auth.index') }}" class="nav-link text-light py-1 small">
                            <i class="bi bi-person-plus me-2"></i> Tambah Akun
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>

        <!--end::Sidebar Wrapper-->
      </aside>