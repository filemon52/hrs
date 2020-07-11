    <!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="active"><a href="/project/tugas/admin"><span>Admin</span></a></li>
            <li class="active"><a href="/materi">Materi</a></li>
            <li class="active"><a href="/submateri">Sub Materi</a></li>
            <li class="active"><a href="/isimateri">Isi Materi</a></li>
            <li class="active"><a href="/soal">Soal</a></li>
                        @guest
            <li class="header"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li class="header"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
            <li class="header"><h3>{{ Auth::user()->name }}</h3></li>
            <li class="header"><a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                        @endguest
            <!-- Optionally, you can add icons to the links -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>