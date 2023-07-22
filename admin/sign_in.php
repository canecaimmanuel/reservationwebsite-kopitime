<html lang="en">

<head>
    <title>Sign In - Food Order System</title>
    <link rel="stylesheet" href="../css/sign_in.css">
</head>

<body>
    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form action="#" method="POST" class="form" id="form1">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" name="username" placeholder="Username" class="input" />
                <input type="password" name="password" placeholder="Password" class="input" />
                <button type="submit" name="submit" class="btn_sign">Sign Up</button>
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">

            <form action="#" method="POST" class="form" id="form2">
                <h2 class="form__title">Sign In</h2>
                <input type="text" name="username" placeholder="Username" class="input" />
                <input type="password" name="password" placeholder="Password" class="input" />
                <a href="#" class="link">Forgot your password?</a>
                <button type="submit" name="submit" class="btn_sign">Sign In</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button type="submit" name="submit" class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button type="submit" name="submit" class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/sign_in.js"></script>
</body>

</html>