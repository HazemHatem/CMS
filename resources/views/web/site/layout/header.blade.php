<!-- start Header -->
<header class="col-12">


  <!-- start nav -->  
<nav class="col-8">

  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route("home")}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route("categories")}}">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('contact.index')}}">Contact-us</a>
    </li>
   
    <li class="nav-item">
      
@if (Auth::check())
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="nav-link">Logout</button>
</form>
<div>
  <img src="{{FileHelper::userimage(Auth::user()->image)}} }}" alt="">
</div>
<p>  {{ Auth::user()->name }}!</p>

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
<h1 style="color: white;   display: block;">  Escape .</h1>

</div>
<!--end  logo -->



</header>
<!-- end Header -->
