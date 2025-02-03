<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/@codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventaris Barang</title>
  <!-- Linking Google fonts for icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    /* Importing Google Fonts - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  background: linear-gradient(#F1FAFF, #CBE4FF);
  overflow-x: hidden;
}
.sidebar {
  position: fixed;
  width: 270px;
  top: 0;
  left: 0;
  bottom: 0;
  border-radius: 0;
  background: #141414;
  height: 100vh;
  overflow-y: auto;
  transition: all 0.4s ease;
}
.sidebar::-webkit-scrollbar {
  width: 8px;
}
.sidebar::-webkit-scrollbar-thumb {
  background-color: #e50914;
  border-radius: 10px;
}
.sidebar.collapsed {
  width: 85px;
}
.sidebar .sidebar-header {
  display: flex;
  position: relative;
  padding: 25px 20px;
  align-items: center;
  justify-content: space-between;
}
.sidebar-header .header-logo img {
  width: 46px;
  height: 46px;
  display: block;
  object-fit: contain;
  border-radius: 50%;
}
.sidebar-header .toggler {
  height: 35px;
  width: 35px;
  color: #141414;
  border: none;
  cursor: pointer;
  display: flex;
  background: #fff;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
  transition: 0.4s ease;
}
.sidebar-header .sidebar-toggler {
  position: absolute;
  right: 20px;
}
.sidebar-header .menu-toggler {
  display: none;
}
.sidebar.collapsed .sidebar-header .toggler {
  transform: translateX(-4px); /* Change animation to translateX */
}
.sidebar-header .toggler:hover {
  background: #dde4fb;
}
.sidebar-header .toggler span {
  font-size: 1.75rem;
  transition: 0.4s ease;
}
.sidebar.collapsed .sidebar-header .toggler span {
  transform: rotate(180deg);
}
.sidebar-nav .nav-list {
  list-style: none;
  display: flex;
  gap: 4px;
  padding: 0 15px;
  flex-direction: column;
  transform: translateY(15px);
  transition: 0.4s ease;
}
.sidebar.collapsed .sidebar-nav .primary-nav {
  transform: translateY(10px); /* Adjust spacing to reduce gap */
}
.sidebar-nav .nav-link {
  color: #fff;
  display: flex;
  gap: 12px;
  white-space: nowrap;
  border-radius: 8px;
  padding: 12px 15px;
  align-items: center;
  text-decoration: none;
  transition: 0.4s ease;
}
.sidebar.collapsed .sidebar-nav .nav-link {
  justify-content: center;
  padding: 12px 0;
  width: 100%;
  text-align: center;
  position: relative;/* Ensure icons are centered */
}

.sidebar.collapsed .sidebar-nav .nav-link .nav-icon {
  font-size: 1.5rem; /* Adjust icon size if needed */
  margin-bottom: 5px;
}

.sidebar.collapsed .sidebar-nav .nav-item {
    position: relative;
  }
  .sidebar.collapsed .sidebar-nav .nav-item .nav-tooltip {
    display: block;
    opacity: 0;
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    white-space: nowrap;
    background: #e50914;
    color: white;
    padding: 6px 12px;
    border-radius: 8px;
    transition: opacity 0.3s ease, transform 0.3s ease;
  }
  .sidebar.collapsed .sidebar-nav .nav-item:hover .nav-tooltip {
    opacity: 1;
    transform: translate(10px, -50%);
  }
.sidebar .sidebar-nav .nav-link .nav-label {
  transition: opacity 0.3s ease, transform 0.3s ease;
  opacity: 1;
  transform: translateX(0);
}
.sidebar.collapsed .sidebar-nav .nav-link .nav-label {
  display: none; 
}
.sidebar.collapsed .sidebar-nav .nav-link:hover .nav-label {
  opacity: 1;
  transform: translateX(100%);
  background: #fff;
  color: #141414;
  padding: 5px 10px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  position: absolute;
  left: 100%;
  white-space: nowrap;
  z-index: 1000;
}
.sidebar-nav .nav-link:hover {
  color: #fff;
  background: #e50914;
}
.sidebar-nav .nav-item {
  position: relative;
}
.sidebar-nav .nav-tooltip {
  position: absolute;
  top: -10px;
  opacity: 0;
  color: #fff;
  display: none;
  pointer-events: none;
  padding: 6px 12px;
  border-radius: 8px;
  white-space: nowrap;
  background: #e50914;
  left: calc(100% + 25px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0s;
}
.sidebar.collapsed .sidebar-nav .nav-tooltip {
  display: block;
}
.sidebar-nav .nav-item:hover .nav-tooltip {
  opacity: 1;
  pointer-events: auto;
  transform: translateX(100%);
  transition: all 0.4s ease;
}
.sidebar-nav .secondary-nav {
  position: absolute;
  bottom: 30px;
  width: 100%;
}
.content {
  margin-left: 270px;
  padding: 20px;
  transition: margin-left 0.4s ease;
}
.sidebar.collapsed ~ .content {
  margin-left: 85px;
}
.nav-tooltip{
  color: #fff;
}
.sidebar-title {
  color: white;
  transition: opacity 0.4s ease;
}
.sidebar.collapsed .sidebar-title {
  opacity: 0;
}
/* Responsive media query code for small screens */
@media (max-width: 1024px) {
  .sidebar {
    height: 56px;
    margin: 0;
    overflow-y: hidden;
    scrollbar-width: none;
    width: 100%;
    max-height: 100vh;
    background: #000; /* Change sidebar color to black */
    position: fixed; /* Fix sidebar position */
    z-index: 1000; /* Ensure sidebar is above content */
  }
  .sidebar.menu-active {
    overflow-y: auto;
  }
  .sidebar .sidebar-header {
    position: sticky;
    top: 0;
    z-index: 20;
    border-radius: 0;
    background: #000; /* Change header color to black */
    padding: 8px 10px;
  }
  .sidebar-header .header-logo img {
    width: 40px;
    height: 40px;
  }
  .sidebar-header .sidebar-toggler,
  .sidebar-nav .nav-item:hover .nav-tooltip {
    display: none;
  }
  
  .sidebar-header .menu-toggler {
    display: flex;
    height: 30px;
    width: 30px;
  }
  .sidebar-header .menu-toggler span {
    font-size: 1.3rem;
  }
  .sidebar .sidebar-nav .nav-list {
    padding: 0 10px;
  }
  .sidebar-nav .nav-link {
    gap: 10px;
    padding: 10px;
    font-size: 0.94rem;
  }
  .sidebar-nav .nav-link .nav-icon {
    font-size: 1.37rem;
  }
  .sidebar-nav .secondary-nav {
    position: relative;
    bottom: 0;
    margin: 40px 0 30px;
  }
  .content {
    margin-left: 0;
    position: relative;
    z-index: 1; /* Ensure content is below sidebar */
  }
  .sidebar.collapsed ~ .content {
    margin-left: 0;
  }
  .sidebar-title {
    display: none; /* Hide title in responsive mode */
  }
}
  .btn-link.nav-link:hover {
    color: #fff;
    background-color: transparent;
  }
  </style>
</head>
<body>
  <!-- Navbar with profile icon and logout -->
  <nav class="navbar navbar-expand-lg" style="background-color: #1f1f1f;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.profile.show') }}" style="color: #e50914;">
                <i class="bi bi-person-circle me-1" style="font-size: 1.5rem;"></i> Halo, {{ auth()->user()->name }}
              </a>
            </li>
            <li class="nav-item">
              <button class="btn btn-link nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #e50914;">
                <i class="bi bi-box-arrow-right me-1" style="font-size: 1.5rem;"></i> {{ __('Logout') }}
              </button>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <aside class="sidebar">
    <!-- Sidebar header -->
    <header class="sidebar-header">
      <h2 class="sidebar-title">Inventory <span style="color: #e50914;">App</span></h2>
      <button class="toggler sidebar-toggler">
        <span class="material-symbols-rounded">chevron_left</span>
      </button>
      <button class="toggler menu-toggler">
        <span class="material-symbols-rounded">menu</span>
      </button>
    </header>
    <nav class="sidebar-nav">
      <!-- Primary top nav -->
      <ul class="nav-list primary-nav">
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="bi bi-house-door-fill"></i>
            <span class="nav-label">Dashboard</span>
          </a>
          <span class="nav-tooltip">Dashboard</span>
        </li>
        @auth
          @if (auth()->user()->type === 'admin')
            <!-- Asset Management -->
            <li class="nav-item">
              <a href="{{ route('kategori_asset.index') }}" class="nav-link">
                <i class="bi bi-box"></i>
                <span class="nav-label">Kategori Asset</span>
              </a>
              <span class="nav-tooltip">Kategori Asset</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('sub_kategori_asset.index') }}" class="nav-link">
                <i class="bi bi-boxes"></i>
                <span class="nav-label">Sub Kategori Asset</span>
              </a>
              <span class="nav-tooltip">Sub Kategori Asset</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('lokasi.index') }}" class="nav-link">
                <i class="bi bi-geo-alt"></i>
                <span class="nav-label">Lokasi</span>
              </a>
              <span class="nav-tooltip">Lokasi</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('distributor.index') }}" class="nav-link">
                <i class="bi bi-truck"></i>
                <span class="nav-label">Distributor</span>
              </a>
              <span class="nav-tooltip">Distributor</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('merk.index') }}" class="nav-link">
                <i class="bi bi-tags"></i>
                <span class="nav-label">Merk</span>
              </a>
              <span class="nav-tooltip">Merk</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('satuan.index') }}" class="nav-link">
                <i class="bi bi-rulers"></i>
                <span class="nav-label">Satuan</span>
              </a>
              <span class="nav-tooltip">Satuan</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('master_barang.index') }}" class="nav-link">
                <i class="bi bi-box-seam"></i>
                <span class="nav-label">Master Barang</span>
              </a>
              <span class="nav-tooltip">Master Barang</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('depresiasi.index') }}" class="nav-link">
                <i class="bi bi-calculator"></i>
                <span class="nav-label">Depresiasi</span>
              </a>
              <span class="nav-tooltip">Depresiasi</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('pengadaan.index') }}" class="nav-link">
                <i class="bi bi-cart"></i>
                <span class="nav-label">Pengadaan</span>
              </a>
              <span class="nav-tooltip">Pengadaan</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('mutasi_lokasi.index') }}" class="nav-link">
                <i class="bi bi-arrow-left-right"></i>
                <span class="nav-label">Mutasi Lokasi</span>
              </a>
              <span class="nav-tooltip">Mutasi Lokasi</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('opname.index') }}" class="nav-link">
                <i class="bi bi-clipboard-check"></i>
                <span class="nav-label">Opname</span>
              </a>
              <span class="nav-tooltip">Opname</span>
            </li>
            <li class="nav-item">
              <a href="{{ route('hitung_depresiasi.index') }}" class="nav-link">
                <i class="bi bi-calculator-fill"></i>
                <span class="nav-label">Hitung Depresiasi</span>
              </a>
              <span class="nav-tooltip">Hitung Depresiasi</span>
            </li>
          @endif
        @endauth
        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="bi bi-box-arrow-in-right"></i>
              <span class="nav-label">{{ __('Login') }}</span>
            </a>
            <span class="nav-tooltip">{{ __('Login') }}</span>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">
                <i class="bi bi-pencil-square"></i>
                <span class="nav-label">{{ __('Register') }}</span>
              </a>
              <span class="nav-tooltip">{{ __('Register') }}</span>
            </li>
          @endif
        @else
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        @endguest
      </ul>
      <!-- Secondary bottom nav -->
    </nav>
  </aside>
  <div class="content">
    @yield('content')
  </div>
  <!-- Script -->
  <script>
    const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const menuToggler = document.querySelector(".menu-toggler");
const content = document.querySelector(".content");
// Ensure these heights match the CSS sidebar height values
let collapsedSidebarHeight = "56px"; // Height in mobile view (collapsed)
let fullSidebarHeight = "100vh"; // Height in larger screen
// Toggle sidebar's collapsed state
sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
  content.classList.toggle("collapsed");
});
// Update sidebar height and menu toggle text
const toggleMenu = (isMenuActive) => {
  sidebar.style.height = isMenuActive ? `${sidebar.scrollHeight}px` : collapsedSidebarHeight;
  menuToggler.querySelector("span").innerText = isMenuActive ? "close" : "menu";
}
// Toggle menu-active class and adjust height
menuToggler.addEventListener("click", () => {
  toggleMenu(sidebar.classList.toggle("menu-active"));
});
// (Optional code): Adjust sidebar height on window resize
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    sidebar.style.height = fullSidebarHeight;
  } else {
    sidebar.classList.remove("collapsed");
    sidebar.style.height = "auto";
    toggleMenu(sidebar.classList.contains("menu-active"));
  }
});
  </script>
</body>
</html>