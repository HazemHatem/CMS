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
            <li class="nav-item profile">
    @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link">Logout</button>
        </form>
        <div>
        <a href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
        <img src="{{  Auth::user()->image }}" alt="User Profile" style="width: 50px; height: 50px; border-radius: 50%;">
            </a>
        </div>
        <a href="{{ route('user.profile', ['id' => Auth::user()->id]) }}"> <!-- رابط ملف المستخدم -->
            <p>{{ Auth::user()->name }}!</p>
        </a>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login.index') }}">Login</a>
        </li>
    @endif
</li>


        </ul>



    </nav>
    <!-- end nav -->



    <!-- start logo -->
    <div class="logo col-4">
        <h1 style="color: white;   display: block;">{{ env('APP_NAME') }}</h1>

    </div>
    <!--end  logo -->



</header>
<!-- end Header -->