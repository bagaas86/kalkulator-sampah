<div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div ">

        <div class="">
            <div class="main-menu-header">
                <img class="img-radius" src="{{ asset('template') }}/dist/assets/images/banksampah.png"
                    style="height:75px;width:75px;" alt="User-Profile-Image">
                <div class="user-details">
                    @php
                        $kata = explode(' ', Auth::user()->name);
                        $hasil = $kata[0];
                    @endphp
                    <div id="more-details">
                        {{ $hasil }}
                        <i class="fa fa-caret-down"></i>
                    </div>
                </div>
            </div>
            <div class="collapse" id="nav-user-link">
                <ul class="list-unstyled">
                    <li class="list-group-item">
                        <a href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="feather icon-log-out m-r-5"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <br>
        <ul class="nav pcoded-inner-navbar ">
            {{-- <li class="nav-item pcoded-menu-caption">
                <label>Navigation</label>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                            class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sampah.index') }}" class="nav-link "><span class="pcoded-micon"><i
                            class="feather icon-home"></i></span><span class="pcoded-mtext">Data Sampah</span></a>
            </li>
            {{-- @if (Auth::user()->sebagai == 'Staff Umum')
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="fa fa-cube"></i></span><span class="pcoded-mtext">Data Sampah</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('dm.barang.index') }}">Barang</a></li>
                        <li><a href="{{ route('dm.ruangan.index') }}">Ruangan</a></li>
                        <li><a href="{{ route('dm.kendaraan.index') }}">Kendaraan</a></li>
                        <li><a href="{{ route('dm.pengguna.index') }}">Pengguna</a></li>
                        <li><a href="{{ route('dm.unit.index') }}">Unit</a></li>
                    </ul>
                </li>
            @endif --}}
        </ul>
    </div>
</div>
