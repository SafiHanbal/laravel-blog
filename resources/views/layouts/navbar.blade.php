<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="{{ route('blogs.index') }}">Laravel Blogs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            @php
                $categories = ['Entertainment', 'Finance', 'Sport', 'Tech', 'Beauty'];
            @endphp

            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ $category }}</a>
                </li>
            @endforeach
        </ul>

        {{-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}

        @if (auth()?->user()?->id)
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('blogs.create') }}">Add New Blog</a>
                        <a class="dropdown-item" href="{{ route('users.edit', ['user' => auth()->user()]) }}">User
                            Settings</a>
                        <a class="dropdown-item" href="{{ route('users.logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.login-form') }}">Login</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
