
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/b3b8c8e375.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="form">
        <h2>Admin Login</h2>
        <form action="#">
            <div class="input-block">
                <img src="/assets/image/envelope-solid.svg">
                <input name="email" class="form_input" type="email" placeholder="Email">
            </div>
            <div class="input-block">
                <img src="/assets/image/lock-solid.svg">
                <input name="password"  class="form_input" id="password" type="password" placeholder="Password">
                <i class="far fa-eye eye_icon" id="togglePassword" onclick="passwordToggler()"></i>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>