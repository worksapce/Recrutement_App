<?php    	session_start();
        if(isset($_SESSION['user'])){
              header('Location: ./../testHome.php');
              exit;
        }
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../PUBLIC/CSS/SignIn.css">
    <script  defer src="../../../PUBLIC/JS/Sign_in & Sign_Up/SignIn.js"></script>

    <title>Sign In</title>
</head>

<body>
    <main class="main">
        <!-- Left Side -->
        <div class="left-side">
            <h2 class="CTA-header">Ready to make a difference!</h2>
            <div class="img-illustration"><img src="../../../PUBLIC/Images/experimental-people.png" alt="illustration"></div>
        </div>
        <!-- Right Side -->
        <div class="right-side">
            <h3 class="">Sign In to Hiring System</h3>
            <div class="main-form">
                <form action="../../views/chatApp/Chat_app.php" method="post"  class="form">
                    <!-- error message -->
                    <p class="error-msg"></p>
                    <div class="input-wrapper">
                        <label for="email">Email:</label>
                        <input required  type="email" name="email" id="email">
                    </div>
                    <div class="input-wrapper">
                        <label for="password">Password:</label>
                        <input required type="password" name="password" id="password">
                    </div>
                  <div class="input-wrapper">
                        <p class="redirect-singUp">I don't have an account <span class="singUp"><a href="./SignUP.php">Sing up</a></span></p>
                     </div>                   

                     <div class="input-btn-wrapper">
                        <input  type="submit" value="Login">
                     </div>
           
            </form>
        </div>

        </div>
    </main>

</body>

</html>