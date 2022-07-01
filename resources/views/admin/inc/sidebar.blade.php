<div class="user-profile-box mb-0">
    <div class="sidebar-header text-center">
        <h2 class="white">Restosaas</h2>
     </div>

    <div class="active-user">
        <h2>{{ Auth::user()->name }}</h2>
    </div>
    <div class="detail clearfix">
        <ul class="mb-0">
            <li>
                <a class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-map-marker"></i> Tableau de bord
                </a>
            </li>
            <li>
                <a href="{{ route('admin.restaurants') }}" class="{{ (request()->is('admin/restaurants*')) ? 'active' : '' }}">
                    <i class="fa fa-list"></i>Restaurants
                    <span class="badge badge-primary">{{ App\Models\Restaurant::count() }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reviews') }}" class="{{ (request()->is('admin/reviews*')) ? 'active' : '' }}">
                    <i class="fa fa-list"></i>Les avis
                    <span class="badge badge-primary">{{ App\Models\Review::count() }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">
                    <i class="fa fa-user" aria-hidden="true"></i>Utilisateurs
                    <span class="badge badge-primary">{{ App\Models\User::count() }}</span>
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
