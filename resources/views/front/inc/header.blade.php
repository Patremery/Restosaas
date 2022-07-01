<!-- Header Container
        ================================================== -->
        <header id="header-container" class="">
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ url('/') }}">
                                <h3>
                                <span>Resto
                                <strong>Saas</strong>
                                </span>
                                </h3>
                            </a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li><a href="{{ url('/') }}">Our restaurants</a>
                                </li>

                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    {{-- <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <a href="add-listing.html" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a>
                        </div>
                        <!-- Header Widget / End -->
                    </div> --}}
                    <!-- Right Side Content / End -->
                    @auth
                        <!-- Right Side Content / End -->
                        <div class="header-user-menu user-menu add">
                            <div class="header-user-name">
                            Salut, {{ Auth::user()->name }}
                            </div>
                            <ul>
                                @if(auth()->user()->type == 0)
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}">Tableau de board</a>
                                    </li>
                                @else
                                    <li><a href="{{ route('user.profile') }}">Mon profil</a></li>
                                    <li><a href="{{ route('user.reviews') }} ">Mes avis</a></li>
                                @endif

                                <li><a href="{{ route('logout') }} " onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Se déconnecter</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- Right Side Content / End -->
                    @else

                        <div class="right-side d-none d-lg-none d-xl-flex ml-0" style="width: 300px">
                            <!-- Header Widget -->
                            <div class="header-widget sign-in ml-30" style="padding:20px">
                                <div class=""><a href=" {{ route('login') }}">Se connecter</a></div>
                            </div>
                            <div class="header-widget sign-in" style="padding:20px">
                                <div class=""><a href="{{ route('register') }}">Créer un compte</a></div>
                            </div>
                            <!-- Header Widget / End -->
                        </div>

                            <!-- Header Widget / End -->
                        </div>
                        <!-- Right Side Content / End -->
                    @endauth
                </div>
            </div>
            <!-- Header / End -->
        </header>
