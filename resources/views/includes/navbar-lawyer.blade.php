<div class="sticky">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    <li aria-haspopup="true">
                        <a href="{{ url('/lawyer/home') }}" class="">
                            <i class="fa fa-desktop"></i>
                            Lawyer Dashboard
                        </a>
                    </li>
                    <li aria-haspopup="true">                     
                        <a href="{ url('/lawyer/cases/show/'.$company->id) }}" class="">
                            <i class="fa fa-gavel"></i>
                            Cases
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/lawyer/clients/show/'.$company->id) }}" class="">
                            <i class="fa fa-users"></i>
                            Clients
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{ url('/lawyer/clients/show/'.$company->id) }}" class="">
                            <i class="fa fa-users"></i>
                            Templates
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