<li class="rd-nav-item {{ Route::currentRouteName() === $href ? 'active' : '' }}">
    <a class="rd-nav-link" href="{{ $href  }}">{{ $title }}</a>
    <!-- RD Navbar Dropdown-->
    @if ($childs !== null)
        
        <ul class="rd-menu rd-navbar-dropdown">
            {{dd($childs)}}
            @foreach ($childs as $child)
                @if(isset($child['childs']))
                    <li class="rd-dropdown-item submenu-wrapper">
                        <a href="#" class="rd-dropdown-link">{{ $child['title'] }}</a>
                        <ul class="submenu-item shadow-sm">
                            @foreach ($child['childs'] as $submenu)
                                <li>
                                    <a
                                        class="rd-dropdown-link"
                                        href="{{ $submenu['href'] }}">
                                        {{ $submenu['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="rd-dropdown-item">
                        <a
                            class="rd-dropdown-link"
                            href="{{ $child['href'] }}">
                            {{ $child['title'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</li>
