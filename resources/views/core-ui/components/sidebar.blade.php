<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('admin-assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('admin-assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        @if(isset($menuSiderbar))
            @foreach($menuSiderbar as $menuParent)
                <li class="{{$menuParent['menu_children'] ? 'nav-group' : 'nav-item'}} ">
                    <a class="nav-link {{$menuParent['menu_children'] ? 'nav-group-toggle' : ''}}"
                       href="{{ asset($menuParent['url']) }}">
                        <svg class="nav-icon">
                            <use
                                xlink:href="{{ asset('admin-assets/vendors/@coreui/icons/svg/free.svg#cil-notes') }}"></use>
                        </svg>
                        {{$menuParent['name']}}
                    </a>
                    @if(isset($menuParent['menu_children']))
                        <ul class="nav-group-items">
                            @foreach($menuParent['menu_children'] as $menuchil)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ asset($menuchil['url']) }}">
                                        {{$menuchil['name']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</div>
