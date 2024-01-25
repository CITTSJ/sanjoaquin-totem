<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Home
                </a>
                <a class="nav-link" href="{{ route('admin.sector.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                    Sectores
                </a>
                <a class="nav-link" href="{{ route('admin.personal.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-user"></i></div>
                    Personal
                </a>
                <a class="nav-link" href="{{ route('admin.faq.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-question"></i></div>
                    Preguntas Frecuentes
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div>
              <a class="nav-link collapsed" href="{{ route('admin.sector.index') }}" data-bs-toggle="collapse"
                  data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                  Sectores
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>

              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                  data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                  <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                  Pages
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                  data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                          data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                          aria-controls="pagesCollapseAuth">
                          Authentication
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                          data-bs-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="login.html">Login</a>
                              <a class="nav-link" href="register.html">Register</a>
                              <a class="nav-link" href="password.html">Forgot Password</a>
                          </nav>
                      </div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                          data-bs-target="#pagesCollapseError" aria-expanded="false"
                          aria-controls="pagesCollapseError">
                          Error
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                          data-bs-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="401.html">401 Page</a>
                              <a class="nav-link" href="404.html">404 Page</a>
                              <a class="nav-link" href="500.html">500 Page</a>
                          </nav>
                      </div>
                  </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Addons</div>
              <a class="nav-link" href="charts.html">
                  <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                  Charts
              </a>
              <a class="nav-link" href="tables.html">
                  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                  Tables
              </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Iniciado sesión con:</div>
            {{ current_user()->nombre }}
        </div>
    </nav>
</div>
