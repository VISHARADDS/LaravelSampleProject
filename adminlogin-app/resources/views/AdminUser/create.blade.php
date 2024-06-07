<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
</head>
<body>

    <div class="form-container">
        <div class="login-container" id="login-container">
            <h1 class="title">Log In</h1>
            <p class="desc">Login to your account to upload or download pictures, videos, or music</p>
            <form action="{{ route('login') }}" method="post">
            @csrf
                <div class="input-container">
                    <input type="email" name="email" placeholder="Enter Your Email Address" autofocus required>
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <br>
                <div class="account-controls">
                    <a href="">Forgot Password?</a>
                    <button type="submit">Next <i class="fas fa-solid fa-angle-right"></i></button>
                </div>
            </form>
            <span class="line"></span>
            <span class="other-login-text">Or log in with</span>
            <div class="social-logins">
                <button class="social-login"><i style="color:#1e7bf2" class="fas fa-brands fa-facebook-f"></i></button>
                <button class="social-login"><i style="color:#ea4335" class="fas fa-brands fa-google"></i></button>
            </div>
            <span class="signup-text">Don't have an account yet? <a id="signup-form-toggler">Sign up</a></span>
        </div>
        <div class="placeholder-banner" id="banner">
            <img src="https://img.freepik.com/free-vector/abstract-flat-design-background_23-2148450082.jpg?size=626&ext=jpg&ga=GA1.1.1286474015.1708934801&semt=sph" alt="" class="banner">
        </div>
        
    <!-- Signup  -->

        <div class="signup-container" id="signup-container">
            <h1 class="title">Signup</h1>
            <p class="desc">Create your account to explore the website</p>
            <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="input-container">
                <input type="text" name="name" id="name" placeholder="Enter Your Full Name">
            </div>
            <div class="input-container">
                <input type="email" name="email" id="email" placeholder="Enter Your Email Address">
            </div>
            <div class="input-container">
                <input name="password" name="password" type="password" placeholder="Enter Your Password">
            </div>
            <div class="input-container">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-type Your Password" required minlength="8">
            </div>
            <br>
            <div class="account-controls">
              <button type="submit">Next <i class="fas fa-solid fa-angle-right"></i></button>
            </div>
          
</form>
            <span class="line"></span>
            <span class="other-login-text">Or Signup with</span>
            <div class="social-logins">
                <button class="social-login"><i style="color:#1e7bf2" class="fas fa-brands fa-facebook-f"></i></button>
                <button class="social-login"><i style="color:#ea4335" class="fas fa-brands fa-google"></i></button>
            </div>
            <span class="signup-text">Already have an account? <a id="login-form-toggler">Login here</a></span>
        </div>
    </div>

    <!-- JavaScript  -->
    <script>
        const banner = document.getElementById("banner");
        const loginContainer = document.getElementById("login-container");
        const signupContainer = document.getElementById("signup-container");
        const loginToggle = document.getElementById("login-form-toggler");
        const signupToggle = document.getElementById("signup-form-toggler");

        signupToggle.addEventListener('click', () => {
            banner.style.transform = "translateX(-100%)";
            loginContainer.style.transform = "scale(0)";
            signupContainer.style.transform = "scale(1)";
        });
        
        loginToggle.addEventListener('click', () => {
            banner.style.transform = "translateX(0%)";
            signupContainer.style.transform = "scale(0)";
            loginContainer.style.transform = "scale(1)";
        });
        @if($errors->any())
            alert('{{ $errors->first() }}');
        @endif
    </script>
   <script>
    @if(session('success'))
        alert('{{ session('success') }}');
        window.location.reload();
    @endif
    
</script>
</body>
</html>
