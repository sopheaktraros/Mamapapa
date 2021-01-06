<header id="header">
    <nav class="navbar navbar-light bg-white">
        <div>
            <button class="btn btn-default btn-custom" id="btn-toggle-close-sidebar" type="button">
                <i class="fas fa-chevron-left" style="font-weight: bold"></i>
            </button>
            <button class="btn btn-default btn-custom d-none" id="btn-toggle-open-sidebar" type="button">
                <i class="fas fa-chevron-right" style="font-weight: bold"></i>
            </button>
        </div>
        <div class="tools">
            <div class="dropdown">
                <button class="btn dropdown-toggle btn-custom" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.300rem 0.75rem;">
                    <img src="{{ url('\images\avatar.jpg') }}" alt="Avatar" class="avatar mr-4">
                       
                    <i class="fal fa-angle-down" style="position:absolute; top:11px; right:11px; font-weight: bold; font-size:16px"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item" style="font-weight: bold">
                        {{ auth()->user()->name }}
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('user-profile') }}">Profile</a>
                    <a class="dropdown-item" href="#">Setting</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <form action="{{ url('logout') }}" method="post" class="form-inline">
                            @csrf
                            <button class="btn p-0 btn-logout">
                               {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>