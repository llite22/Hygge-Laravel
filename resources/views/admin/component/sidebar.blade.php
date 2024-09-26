<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>


    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">

            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-text">
                    <a href="{{route('main.index')}}" class="nav-link">Hygge</a>
                </li>
                <li class="nav-item toggle-sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather sidebarCollapse feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </li>
            </ul>

            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu {{ Request::is('admin/users') || Request::is('admin/category-products') ? 'active' : '' }}">
                    <a href="#dashboard" data-toggle="collapse" aria-expanded="{{ Request::is('admin/users') || Request::is('admin/category-products') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('admin/users') || Request::is('admin/category-products') ? 'show' : '' }}" id="dashboard" data-parent="#accordionExample">
                        <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                            <a href="{{ route('admin.users') }}"> Пользователи </a>
                        </li>
                        <li class="{{ Request::is('admin/category-products') ? 'active' : '' }}">
                            <a href="{{ route('admin.category-products') }}"> Продукты категорий </a>
                        </li>
                    </ul>
                </li>


                {{--                <li class="menu menu-heading">--}}
                {{--                    <div class="heading">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
                {{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                             class="feather feather-circle">--}}
                {{--                            <circle cx="12" cy="12" r="10"></circle>--}}
                {{--                        </svg>--}}
                {{--                        <span>Таблицы</span></div>--}}
                {{--                </li>--}}

                @foreach($nameTables as $index => $nameTable)
                    <li class="menu">
                        <a href="{{ route($routers[$index]) }}" aria-expanded="true" class="dropdown-toggle">
                            <div >
                                <span>{{$nameTable}}</span>
                            </div>0
                        </a>
                    </li>
                @endforeach
            </ul>

        </nav>

    </div>
    <!--  END SIDEBAR  -->
