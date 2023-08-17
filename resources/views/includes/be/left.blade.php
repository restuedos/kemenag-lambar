<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/dashboard/config" class="nav-link {{ Request::is('dashboard/config') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <p>
                    Config
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dashboard/menu" class="nav-link {{ Request::is('dashboard/menu') ? 'active' : '' }}">
                <i class="fas fa-bars"></i>
                <p>
                    Menu
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-newspaper"></i>
                <p>
                    Post
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/dashboard/post" class="nav-link {{ Request::is('dashboard/post') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Informasi Terkini
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/page" class="nav-link {{ Request::is('dashboard/page') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>

                        <p>
                            Halaman
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/dashboard/gallery" class="nav-link {{ Request::is('dashboard/gallery') ? 'active' : '' }}">
                <i class="fas fa-layer-group"></i>
                <p>
                    Kategori
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/dashboard/slider" class="nav-link {{ Request::is('dashboard/slider') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <p>
                    Slider
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/dashboard/service" class="nav-link {{ Request::is('dashboard/service') ? 'active' : '' }}">
                <i class="fas fa-tools"></i>
                <p>
                    Layanan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-info"></i>
                <p>
                    Informasi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/dashboard/info" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Pengumuman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/infographic"
                        class="nav-link {{ Request::is('dashboard/infographic') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>

                        <p>
                            Info Grafis
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/dashboard/video" class="nav-link {{ Request::is('dashboard/video') ? 'active' : '' }}">
                <i class="fas fa-play"></i>
                <p>
                    Video
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dashboard/file" class="nav-link {{ Request::is('dashboard/file') ? 'active' : '' }}">
                <i class="fas fa-folder"></i>
                <p>
                    File
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/dashboard/user" class="nav-link {{ Request::is('dashboard/user') ? 'active' : '' }}">
                <i class="fas fa-user"></i>
                <p>
                    User
                </p>
            </a>
        </li>

        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}

                <button type="submit" class="btn btn-sm btn-danger ml-3 mt-3"><i class="fas fa-user-slash"> Log
                        Out</i></button>
            </form>
        </li>
    </ul>

</nav>
