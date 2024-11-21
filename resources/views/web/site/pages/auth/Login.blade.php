<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('site/Style/css/libs/bootstrap/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{asset('site/style/css/login/index.css')}}">
    <title>Login</title>

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{route('register.register')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <h1>Create Acount</h1>

                <span>Or use your email for registeration</span>

                <input type="text" name="name" placeholder="Name" />
                @error('name')
                <span class="error">{{$message}}</span>

                @enderror

                <input type="email" name="email" placeholder="Email" />
                @error('email')
                <span class="error">{{$message}}</span>

                @enderror
                <input type="password" name="password" placeholder="Password" />
                @error('password')
                <span class="error">{{$message}}</span>

                @enderror

                <input type="text" name="phone" placeholder="Phone" />
                @error('phone')
                <span class="error">{{$message}}</span>
                @enderror
                <div class="d-flex" style="margin-right: 120px;">
                    <input type="checkbox" name="rule_id" value="2" id="rule_id" class="me-2">
                    <label for="rule_id" class="mt-1">Author</label>
                </div>
                <button>Sign-Up</button>

            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{route('login.store')}}" method="POST">
                @csrf
                <h1>sign-In</h1>
                <!-- <div class="social-icons">
                    <a href="#" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </div>
                <span>Or use your email password</span> -->


                <input type="email" name="email" placeholder="Email" />
                @error('email')
                <span class="error">{{$message}}</span>

                @enderror
                <input type="password" name="password" placeholder="Password" />
                @error('password')
                <span class="error">{{$message}}</span>

                @enderror
                <span class="float-end">forget password?<a class="text-decoration-none text-primary" href="{{ route('password.request') }}"> reset password</a></span>
                <button>Sign-In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">sign-In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello Friend!</h1>
                    <p>Register With with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('site/style/css/login/script.js')}}"></script>
</body>

</html>
