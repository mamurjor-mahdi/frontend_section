<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html">
            <div class="iq-light-logo">
                <img src="{{ asset('backend') }}/images/logo.gif" class="img-fluid" alt="">
            </div>
            <div class="iq-dark-logo">
                <img src="{{ asset('backend') }}/images/logo-dark.gif" class="img-fluid" alt="">
            </div>
            <span>Vito</span>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                    <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="iq-menu-title"><i class="ri-subtract-line"></i>
                    <span>Home</span></li>
                @permission('app.dashboard')
                <li class="{{ Request::is('app/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('app.dashboard') }}" class="iq-waves-effect "><i
                            class="ri-home-4-line"></i><span>Dashboard</span></a>
                </li>
                @endpermission
                <li class="iq-menu-title"><i class="ri-subtract-line"></i>
                    <span>Apps</span></li>

                @permission('app.roles.index')
                    <li class="{{ Request::is('app/roles') ? 'active' : '' }}">
                        <a href="#roles_permisstion" class="iq-waves-effect {{ Request::is('app/roles*') ? '' : 'collapsed' }}"  data-toggle="collapse" aria-expanded="{{ Request::is('app/roles*') ? 'true' : 'false' }}"><i class="fa-solid fa-gear"></i><span>Roles & Permissions</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="roles_permisstion" class="iq-submenu collapse {{ Request::is('app/roles*') ? 'show' : '' }}" data-parent="#roles_permisstion">
                            <li class="{{ Request::is('app/roles*') ? 'active' : '' }}"><a href="{{ route('app.roles.index') }}" ><i class="ri-profile-line"></i>Roles</a></li>
                        </ul>
                    </li>
                @endpermission
                <li class="{{ Request::is('app/users*') ? 'active' : '' }}">
                    <a href="#userinfo" class="iq-waves-effect {{ Request::is('app/users*') ? '' : 'collapsed' }}"  data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>Users</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="userinfo" class="iq-submenu {{ Request::is('app/users*') ? 'show' : 'collapse' }}" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('app/users/user*') ? 'active' : '' }}"><a href="#"><i class="ri-profile-line"></i>User</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('app/home*') ? 'active' : '' }}">
                    <a href="#single_pages" class="iq-waves-effect {{ Request::is('app/home*') ? '' : 'collapsed' }}"  data-toggle="collapse" aria-expanded="{{  Request::is('app/home*') ? 'true' : 'false'  }}"><i class="fa-brands fa-pagelines"></i></i><span>Home Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="single_pages" class="iq-submenu  {{ Request::is('app/home*') ? 'show' : 'collapse' }}" data-parent="#single_pages">
                        <li class="{{ Request::is('app/home/hero*') ? 'active' : '' }}"><a href="{{ route('app.hero.form.show') }}"><i class="fa-solid fa-section"></i>hero section</a></li>
                        <li  class="{{ Request::is('app/home/counter*') ? 'active' : '' }}"><a href="{{ route('app.counter.index') }}"><i class="fa-solid fa-section"></i>Counter Section</a></li>
                        <li class="{{ Request::is('app/home/about*') ? 'active' : '' }}">  <a href="{{ route('app.about.form.show') }}"><i class="fa-solid fa-section"></i>About Section</a></li>
                        <li  class="{{ Request::is('app/home/service*') ? 'active' : '' }}"><a href="{{ route('app.service.index') }}"><i class="fa-solid fa-section"></i>Service Section</a></li>
                        <li  class="{{ Request::is('app/home/choose*') ? 'active' : '' }}"><a href="{{ route('app.choose.index') }}"><i class="fa-solid fa-section"></i>Choose Section</a></li>
                        <li  class="{{ Request::is('app/home/testmonial*') ? 'active' : '' }}"><a href="{{ route('app.testmonial.index') }}"><i class="fa-solid fa-section"></i>Testmonial Section</a></li>
                        <li  class="{{ Request::is('app/home/portfolio*') ? 'active' : '' }}"><a href="{{ route('app.portfolio.index') }}"><i class="fa-solid fa-section"></i>Portfolio Section</a></li>
                        <li  class="{{ Request::is('app/home/blog*') ? 'active' : '' }}"><a href="{{ route('app.blog.index') }}"><i class="fa-solid fa-section"></i>Blog Section</a></li>
                        <li  class="{{ Request::is('app/home/hireme*') ? 'active' : '' }}"><a href="{{ route('app.hireme.form.show') }}"><i class="fa-solid fa-section"></i>HireMe Section</a></li>
                        
                    </ul>
                </li>
                <li class="{{ Request::is('app/pagetitle*') ? 'active' : '' }}">
                    <a href="#single_pages_title" class="iq-waves-effect {{ Request::is('app/pagetitle*') ? '' : 'collapsed' }}"  data-toggle="collapse" aria-expanded="false"><i class="fa-brands fa-pagelines"></i></i><span>Single Page Titles</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="single_pages_title" class="iq-submenu {{ Request::is('app/pagetitle*') ? 'show' : 'collapse' }}" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('app/pagetitle*') ? 'active' : '' }}"><a href="{{ route('app.pagtitle.form.show') }}"><i class="fa-solid fa-section"></i>Section Title</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('app/blogcategory*') ? 'active' : '' }}">
                    <a href="#category" class="iq-waves-effect {{ Request::is('app/blogcategory*') ? '' : 'collapsed' }}"  data-toggle="collapse" aria-expanded="false"><i class="fa-brands fa-pagelines"></i></i><span>Blogs</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="category" class="iq-submenu {{ Request::is('app/blogcategory*') ? 'show' : 'collapse' }}" data-parent="#iq-sidebar-toggle">
                        <li  class="{{ Request::is('app/blogcategory*') ? 'active' : '' }}"><a href="{{ route('app.blog.category.index') }}"><i class="fa-solid fa-section"></i>Category</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('app/settings*') ? 'active' : '' }}">
                    <a href="#contact_email" class="iq-waves-effect {{ Request::is('app/settings*') ? '' : 'collapsed' }}" data-toggle="collapse" aria-expanded="false">
                        {{-- <i class="ri-pencil-ruler-line"></i> --}}
                        <i class="fa-brands fa-vuejs"></i>
                        <span>Theme Settings</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="contact_email" class="iq-submenu {{ Request::is('app/settings*') ? 'show' : 'collapse' }}" data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('app/settings/contact*') ? 'active' : '' }}"><a href="{{ route('app.contact.index.show') }}"><i class="fa-solid fa-section"></i>Contact Email</a></li>
                        <li class="{{ Request::is('app/settings/mapaddress*') ? 'active' : '' }}"><a href="{{ route('app.mapaddress.form.show') }}"><i class="fa-solid fa-section"></i>Map Address</a></li>
                        <li class="{{ Request::is('app/settings/general*') ? 'active' : '' }}"><a href="{{ route('app.setting.create') }}"><i class="fa-solid fa-section"></i>General</a></li>
                    </ul>
                </li>
                <li class="iq-menu-title"><i class="ri-subtract-line">
                    </i>
                    <span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </span>
                </li>

            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
