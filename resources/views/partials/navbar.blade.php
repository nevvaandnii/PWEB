<header class="navbar">

  <div class="logo">
    <img src="image/logoBersih.png" alt="logo">
  </div>

  <div class="box">
    <form class="search-box">

      <input type="text" placeholder="Cari disini">

      <button type="submit" class="icons">
        <i class="fas fa-search"></i>
      </button>

    </form>
  </div>

  <nav>

    <a href="{{ url('/dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('transaksi.create') }}">
        Transaksi
    </a>

    <a href="{{ route('transaksi.index') }}">
        Daftar Transaksi
    </a>

    <a href="#">
        Pelanggan
    </a>

</nav>

  <div class="user-login">
    Halo, {{ auth()->user()->name }}
  </div>
<div class="user-section">

    Halo, {{ auth()->user()->name }}

    <form action="{{ route('logout') }}"
          method="POST">

        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>

    </form>

</div>
</header>
