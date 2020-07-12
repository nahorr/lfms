<div class="dropdown profile-1">
    <a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
        <span>
            <img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="avatar  mr-xl-3 profile-user brround cover-image">
        </span>
        <div class="text-center mt-2 d-none d-xl-block">
            <h6 class="text-dark mb-0 fs-13 font-weight-semibold">{{ Auth::user()->name }}</h6>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{{ url('/user/profile') }}">
            <i class="dropdown-icon mdi mdi-account-outline"></i> My Profile
        </a>
        @if(Auth::user()->is_admin == 1)
        <a class="dropdown-item" href="{{ url('/admin/home') }}">
            <i class="dropdown-icon  mdi mdi-account-plus"></i> Administrator
        </a>
        @endif
        @if(Auth::user()->is_superadmin == 1)
        <a class="dropdown-item" href="{{ url('/super/home') }}">
            <span class="float-right"></span>
            <i class="dropdown-icon mdi mdi-account-key"></i> Super Admin
        </a>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="dropdown-icon mdi mdi-power"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>