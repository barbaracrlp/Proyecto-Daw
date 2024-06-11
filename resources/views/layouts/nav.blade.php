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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Brands</a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\User::where('is_designer', true)->get() as $user)
                    <li><a class="dropdown-item" href="{{ route('user.designs', $user->id) }}">{{ $user->brand }}</a></li>
                @endforeach
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Collections</a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\Collection::all() as $collection)
                    <li><a class="dropdown-item" href="{{ route('collection.designs', $collection->id) }}">{{ $collection->name }}</a></li>
                @endforeach
                </ul>
            </li>


            <li class="nav-item">
                @auth
                    <form style="display:inline;" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#"  class="nav-link"  onclick="this.closest('form').submit()"><strong>Log out</strong></a>
                    </form>
                @else
                    <a class="nav-link"  href="{{ route('login') }}">Log In</a>
                @endauth
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin" >for Designers</a>
            </li>

            <li class="nav-item">
                <livewire:cart-dropdown/>
            </li>

            <li class="nav-item">
                @auth
                        <a href="/carts/index"  class="nav-link"><strong>My orders</strong></a>

                @endauth
            </li>
        </ul>
    </div>
</nav>
