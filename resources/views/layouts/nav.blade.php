<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="/">
                    <img src='{{ asset('images/iconoRaven.png') }}' alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Raven's Treasure
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('designs.index') }}">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Category</a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\Category::all() as $category)
                        <li><a class="dropdown-item" href="{{ route('category.designs', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Type</a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\Type::all() as $type)
                        <li><a class="dropdown-item" href="{{ route('type.designs', $type->id) }}">{{ $type->name }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                @auth
                    <form style="display:inline;" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="this.closest('form').submit()">Logout</a>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                @endauth
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin" target="_blank">for Designers</a>
            </li>
        </ul>
    </div>
</nav>