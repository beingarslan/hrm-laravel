<ul class="menu-content">
    @if(isset($menu))
    @foreach($menu as $submenu)
    @can($submenu->can)
    <li @if(str_contains(Route::currentRouteName(), $submenu->slug)) class="active" @endif>
        <a class="menu-item" href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}" data-i18n="Bootstrap" title="{{$submenu->name}}">
            @if(isset($submenu->icon))
            <i class="{{$submenu->icon}}"></i>
            @endif

            {{$submenu->name}}
            {{--
            @if( isset($submenu->children) && count($submenu->children) > 0 )
            @include('includes.left-sub-menu', ['menu' => $submenu->children])
            @endif 
            --}}
        </a>
    </li>
    @endcan
    @endforeach
    @endif
</ul>