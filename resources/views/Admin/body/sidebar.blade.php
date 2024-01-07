<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('Adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
         <a href="{{ route('admin.dashboard') }}" class="logo-text" >Who Calling ?</a>
        </div>

    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">



        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">General</div>
            </a>
            <ul>

                <li> <a href="{{ route('about.us') }}"><i class="bx bx-right-arrow-alt"></i>About-Us</a>

            </ul>

            <ul>

                <li> <a href="{{ route('privacy.policy') }}"><i class="bx bx-right-arrow-alt"></i>Privacy Policy</a>

            </ul>

            <ul>

                <li> <a href="{{ route('all.faq') }}"><i class="bx bx-right-arrow-alt"></i>FAQ</a>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
{{--                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Add About-Us</a>--}}
{{--                </li>--}}
                <li> <a href="{{ route('all-user') }}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                <li> <a href="{{ route('premium.user') }}"><i class="bx bx-right-arrow-alt"></i>All premium users</a>
                <li> <a href="{{ route('normal.user') }}"><i class="bx bx-right-arrow-alt"></i>All normal users</a>

            </ul>
        </li>



















    </ul>
    <!--end navigation-->
</div>
