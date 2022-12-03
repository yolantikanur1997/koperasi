

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-user"></i> <span>Koperasi</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{session('nama')}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/pengguna"><i class="fa fa-user"></i> Users</a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="/tujuan"><i class="fa fa-users"></i> Tujuan</a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="/bank"><i class="fa fa-money-check-dollar"></i> Bank</a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="/users"><i class="fa fa-note-sticky"></i> Tagihan</a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="/users"><i class="fa fa-note-sticky"></i> Faktur</a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="/users"><i class="fa fa-note-sticky"></i> Pembayaran</a></li>
                </ul>
              </div>
         

            </div>
            <!-- /sidebar menu -->

         
          </div>
        </div>

      <!-- top navigation -->
      <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                     
                    <li class="nav-item dropdown open" style="padding-left: 15px;"> 
                    <form action="/logout" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin ingin Logout?')">Logout</button>
                      </form>
                      </li>
                      </form>

            
                    </ul>
                  </nav>
                </div>
              </div>

              <!-- /top navigation -->