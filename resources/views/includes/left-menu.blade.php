<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(isset($menuData[0]))
            @foreach($menuData[0] as $menu)
            @can($menu->can)
            <li class="nav-item @if(str_contains(Route::currentRouteName(), $menu->slug)) active @endif" title="{{$menu->name}}">
                <a href="{{url($menu->url)}}">
                    <i class="{{ $menu->icon }}"></i>
                    <span class="menu-title" data-i18n="">{{$menu->name}}</span>
                </a>
                @if(count($menu->children) > 0 )
                @include('includes.left-sub-menu', ['menu' => $menu->children])
                @endif
            </li>
            @endcan
            @endforeach
            @endif
        </ul>
    </div>
</div>