<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="{{route('home')}}">BLOG APPLICATION</a>

                <div class="loginInfo">

                    @guest
                        <a href="{{route('login')}}" class="btn btn-md btn-info px-3 text-light">Login</a>
                    @endguest

                    @auth
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{Auth::user()->name}}
                        </a>

                        <ul class="dropdown-menu text-center">
                          <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                          <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                          <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <input type="submit" value="Logout" class="btn btn-sm btn-danger">
                            </form>
                          </li>
                        </ul>
                      </div>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
