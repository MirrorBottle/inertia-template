<!-- Page Header-->
<header class="section page-header">
    <!-- RD Navbar-->
    @foreach ($menus as $menu)
        <li class="rd-nav-item {{ Route::currentRouteName() === $menu->url ? 'active' : '' }}">
            <a class="rd-nav-link" href="{{ $menu->url }}">{{ $menu->name }}</a>
            <!-- RD Navbar Dropdown-->
            @if ($menu->items->count() > 0)
                <ul class="rd-menu rd-navbar-dropdown">
                    @foreach ($menu->items as $submenu)
                    <li class="rd-dropdown-item">
                        <a class="rd-dropdown-link" href="{{ $submenu->url }}">
                            {{ $submenu->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</header>
