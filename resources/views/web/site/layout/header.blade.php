<!-- start Header -->
<header class="col-12">


    <!-- start nav -->
    <nav class="col-8">

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route("home")}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("article.index")}}">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("category.index")}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("contact.index")}}">Contact-us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("wishlist.index")}}">Wishlist</a>
            </li>
            <li class="nav-item">
                @if (Auth::user())
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                @else
                <a class="nav-link" href="{{ route('login.index') }}">Login</a>
                @endif
            </li>
            <li class="nav-item d-flex">
                @if (Auth::user())
                @if (Auth::user()->rule->name == 'author')
                <a class="nav-link text-primary" href="{{ route('Author.dashboard.index') }}">
                    {{ Auth::user()->name }}
                    <img src="{{FileHelper::userimage(Auth::user()->image) }}" class="rounded-circle ms-1" style="width: 40px; height: 40px;" alt="{{ Auth::user()->name }}">
                </a>
                @elseif (Auth::user()->rule->name == 'admin' || Auth::user()->rule->name == 'manager')
                <a class="nav-link text-primary" href="{{ route('Admin.dashboard') }}">
                    {{ Auth::user()->name }}
                    <img src="{{FileHelper::userimage(Auth::user()->image) }}" class="rounded-circle ms-1" style="width: 40px; height: 40px;" alt="{{ Auth::user()->name }}">
                </a>
                @else
                <a class="nav-link text-primary" href="{{ route('profile.index') }}">
                    {{ Auth::user()->name }}
                    <img src="{{FileHelper::userimage(Auth::user()->image) }}" class="rounded-circle ms-1" style="width: 40px; height: 40px;" alt="{{ Auth::user()->name }}">
                </a>
                @endif
                @endif
            </li>
        </ul>
    </nav>
    <!-- end nav -->

    <!-- start logo -->
    <div class="logo col-4">
        <a class="h1" href="{{route("home")}}" style="color: white;   display: block;">{{ env('APP_NAME') }}</a>

    </div>
    <!--end  logo -->



</header>
<!-- end Header -->