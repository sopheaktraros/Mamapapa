<nav id="sidebar">
    @php
        $navigations = [  
            [
                'name' => 'Customer',
                'icon' => 'fa-users',
                'permission' => 'customer',
                'id' => 'nav-customer',
                'isActive' => (Request::segment(1) == 'customers'),
                'url' => route('customers.index'),
                'children' => [
                ]
            ],
            [
                'name' => 'Website',
                'icon' => 'fa-rss',
                'permission' => 'website',
                'id' => 'nav-new-order',
                'children' => [
                    [
                        'name' => 'Silder',
                        'permission' => 'slider',
                        'url' => route('sliders.index'),
                        'icon' => 'fa-users-cog',
                        'isActive' => (Request::segment(1) == 'sliders')
                    ],
                    [
                        'name' => 'Home Page',
                        'permission' => 'home_page',
                        'url' => route('home-pages.index'),
                        'icon' => 'fa-users-cog',
                        'isActive' => (Request::segment(1) == 'home-pages')
                    ],
                    [
                        'name' => 'About Us',
                        'permission' => 'about_us',
                        'url' => route('about-us.index'),
                        'icon' => 'fa-users-cog',
                        'isActive' => (Request::segment(1) == 'about-us')
                    ],
                    [
                        'name' => 'Help Center',
                        'permission' => 'help_center',
                        'url' => route('help-centers.index'),
                        'icon' => 'fa-users-cog',
                        'isActive' => (Request::segment(1) == 'help-centers')
                    ],
                ]
            ],
            [
                'name' => 'Security',
                'icon' => 'fa-shield-alt',
                'permission' => 'security',
                'children' => [
                    [
                        'name' => 'Users',
                        'permission' => 'user',
                        'url' => route('users.index'),
                        'icon' => 'fa-users-cog',
                        'isActive' => (Request::segment(1) == 'users')
                    ],
                    [
                        'name' => 'Roles',
                        'permission' => 'role',
                        'url' => route('roles.index'),
                        'icon' => 'fa-medal',
                        'isActive' => (Request::segment(1) == 'roles')
                    ]
                ]
            ],
            [
                'name' => 'Settings',
                'icon' => 'fa-cog',
                'permission' => 'setting',
                'children' => [
                    [
                        'name' => 'General',
                        'permission' => 'general',
                        'url' => route('settings.index'),
                        'icon' => 'fa-cog',
                        'isActive' => (Request::segment(1) == 'settings')
                    ],
                ]
            ],
        ];
    @endphp
    <div class="sidebar-header">
        <div class="sidebar-title">MAMAPAPA ECOMMERCE</div>
    </div>
    <ul id="main-nav" class="scroller">
        
        @foreach($navigations as $i => $nav)
        @php
            if(count($nav['children']) > 0) {
                $isActive = count(array_filter($nav['children'], function($child) {
                    return $child['isActive']  == true;
                }));
            } else {
                $isActive = isset($nav['isActive']) ? $nav['isActive'] : false;
            }
        @endphp

            <li class="{{ ($nav['children'] ? "has-child" : "") }} {{ $isActive ? 'active' : '' }}" 
                {{ isset($nav['id']) ? ('id=' . $nav['id']) : '' }}>
                @authorize($nav['permission'], 'read')

                @if(count($nav['children']) > 0)
                    <a href="#" class="nav-main-list-item" 
                        data-toggle="popover" data-html="true"  data-trigger="hover" 
                        data-content='<ul class="sub-nav sub-nav-sm">
                            @foreach($nav['children'] as $subNav)
                                @authorize($subNav['permission'], 'read')
                                <li class="{{ $subNav['isActive'] ? 'active' : '' }}">
                                    <a href="{{ $subNav['url'] }}">
                                        <div class="row" id="{{str_replace(' ', '-', $nav['name']. '-' .$subNav['name']) }}">
                                            <div class="col-md-12">
                                                <span>{{ $subNav['name'] }}</span>
                                            </div>
                                        </div> 
                                    </a>
                                </li>
                                @endauthorize
                            @endforeach
                        </ul>'>
                        <span class="icon-sidebar">
                            <i class="fal {{ $nav['icon'] }}"></i>
                        </span>
                        <span class="label-sidebar">{{ $nav['name'] }}</span>
                        <i class="icon-sub-menu fas {{$isActive ? 'fa-angle-down' : 'fa-angle-right'}}" style="margin-left: 95px"></i>
                    </a>
                    <ul class="sub-nav {{$isActive ? 'show' : 'hide'}}" style="{{$isActive ? '' : 'display:none'}}">
                        @foreach($nav['children'] as $subNav)
                            @authorize($subNav['permission'], 'read')
                            <li class="{{ $subNav['isActive'] ? 'active' : '' }}">
                                <a href="{{ $subNav['url'] }}">
                                    <div class="row" id="{{str_replace(' ', '-', $nav['name']. '-' .$subNav['name']) }}">
                                        <div class="col-md-12">
                                            <span>{{ $subNav['name'] }}</span>
                                        </div>
                                    </div> 
                                </a>
                            </li>
                            @endauthorize
                        @endforeach
                    </ul>
                @else
                    <a class="main-item-sidebar" href="{{ $nav['url'] }}" 
                        data-toggle="popover" data-trigger="hover" data-content="{{$nav['name']}}">
                        <span class="icon-sidebar">
                            <i class="fal {{ $nav['icon'] }}"></i>
                        </span>
                        <span class="label-sidebar">{{ $nav['name'] }}</span>
                    </a>
                @endif

                @endauthorize
            </li>
        @endforeach
    </ul>
</nav>
