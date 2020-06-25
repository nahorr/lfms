<div class="sticky">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <ul class="horizontalMenu-list">
                    <li aria-haspopup="true">
                        <a href="{{ url('/super/home') }}" class="">
                            <i class="fa fa-desktop"></i>
                            Super Dashboard
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{route('companies') }}" class="">
                            <i class="fa fa-building-o"></i>
                              Companies
                        </a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="{{route('All Users') }}" class="">
                            <i class="fa fa-users"></i>
                            Users
                        </a>
                    </li>
                    
                    <li aria-haspopup="true">
                        <a href="{{route('super.subscriptions') }}" class="">
                            <i class="fa fa-dollar"></i>
                            Subscriptions
                        </a>
                    </li>
                </ul>
            </nav>
            <!--Nav-->
        </div>
    </div>
</div>