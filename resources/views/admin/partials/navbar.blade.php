@php use Illuminate\Support\Facades\Auth; @endphp
<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if(Auth::user()->profile  == null)
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            @else
                <img alt="image" src="{{ File::exists('uploads/profiles/' . Auth::user()->name . '/' . Auth::user()->profile->image) &&
                                Auth::user()->profile->image != null
                                    ? asset('uploads/profiles/' . Auth::user()->name . '/' . Auth::user()->profile->image)
                                    : asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1"
                     style="width: 40px; height: 40px">
            @endif

            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->fullname }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
            <a href="{{ route('admin.profiles.show', Auth::user()->id) }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>


            <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="d-flex align-items-center dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </li>
</ul>
