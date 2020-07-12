<div class="sticky">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    <li aria-haspopup="true">
                        <a href="{{ url('/admin/home') }}" class="">
                            <i class="fa fa-desktop"></i>
                            Admin Dashboard
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/admin/docs') }}" class="">
                            <i class="fa fa-file"></i>
                            Documents
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/admin/users/showusers/'.$company->id) }}" class="">
                            <i class="fa fa-users"></i>
                            Company Users
                        </a>
                    </li>
                    <li aria-haspopup="true">                     
                        <a href="{ url('/admin/cases') }}" class="">
                            <i class="fa fa-gavel"></i>
                            Cases
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/admin/clients/showclients/'.$company->id) }}" class="">
                            <i class="fa fa-users"></i>
                            Clients
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/admin/lawyers/showlawyers/'.$company->id) }}" class="">
                            <i class="fa fa-black-tie"></i>
                            Lawyers
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