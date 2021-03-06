<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asips | Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="./assets/images/logo.png">
  <!-- Custom styles -->
  <link rel="stylesheet" href="elegant/css/style.min.css">
  <link rel="stylesheet" href="./css/tabel.css">

</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="elegant/#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Asips</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="/dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Data Master
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                      @if (auth()->user()->id_role=='1')
                        <li>
                            <a href="/kecamatan">Kecamatan</a>
                        </li>
                        <li>
                            <a href="/kelurahan">Kelurahan</a>
                        </li>
                        <li>
                            <a href="/posyandu">Posyandu</a>
                        </li>
                        <li>
                            <a href="/role">Role</a>
                        </li>
                        <li>
                          <a href="/user">User</a>
                        </li>
                      @endif
                        <li>
                            <a href="/balita">Balita</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Laporan
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="/history">History Posyandu</a>
                        </li>
                    </ul>
                </li>
                <li>

                </li>

        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <div class="sidebar-user-info">
                <div class="small">Login Sebagai: {{ auth()->user()->username }}</div>
            </div>
        </a>
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <div class="lang-switcher-wrapper">

      </div>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="elegant/img/avatar/avatar-illustrated-02.jpg" type="image/webp"><img src="elegant/img/avatar/avatar-illustrated-02.jpg" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
            <li><a class="danger" href="/logout">
                <i data-feather="log-out" aria-hidden="true"></i>
                <span>Log out</span>
              </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="row">
    <div class="container">
        @yield('tabel')
    </div>
</div>

    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
     <a href="https://www.youtube.com/watch?v=iVlFS_ghWjc" target="_blank"
          rel="noopener noreferrer">Asips-dashboard.com</a>
    </div>

  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="elegant/plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="elegant/plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="elegant/js/script.js"></script>
</body>

</html>
