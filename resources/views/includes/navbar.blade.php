<div class="sticky">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    <li aria-haspopup="true">
                        <a href="{{ url('/user/home') }}" class="">
                            <i class="fa fa-desktop"></i>
                            User Dashboard
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/user/docs') }}" class="">
                            <i class="fa fa-file"></i>
                            Documents
                        </a>
                    </li>
                    <li aria-haspopup="true">                     
                        <a href="{ url('/user/cases') }}" class="">
                            <i class="fa fa-gavel"></i>
                            Cases
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/user/profile') }}" class="">
                            <i class="fa fa-user"></i>
                            My Profile
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ route('logout') }}" class=""
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            <!--Nav-->
        </div>
    </div>
</div>