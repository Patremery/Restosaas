<div class="col-lg-12 mobile-dashbord dashbord">
    <div class="dashboard_navigationbar dashxl">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i>Restosaas Tableau de bord</button>
            <ul id="myDropdown" class="dropdown-content">
                <li>
                    <a class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-map-marker mr-3"></i>
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">
                        <i class="fa fa-user mr-3" aria-hidden="true"></i>Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.restaurants') }}" class="{{ (request()->is('admin/restaurants*')) ? 'active' : '' }}">
                        <i class="fa fa-list mr-3"></i>
                        Restaurants
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
