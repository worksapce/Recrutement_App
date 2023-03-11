<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../PUBLIC/CSS/SignUp.css">
    <!-- Sign UP js  -->
    <script defer src= "../../../PUBLIC/JS/Sign_in & Sign_Up/SignUp.js" ></script>

    <title>Sign Up</title>
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
        <h3 class="">Sign up to Hiring System</h3>
            <div class="main-form">
  
                <form  action="/nextStep.php" method="post" class="form">
                    <p class="error-msg"></p>
                    <div class="first-input">
                        <div class="input-wrapper">
                            <label for="firstName">First Name:</label>
                            <input  type="text" name="firstName" id="firstName">
                        </div>
                        <div class="input-wrapper">
                            <label for="lastName">last Name:</label>
                            <input  type="text" name="lastName" id="lastName">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <label for="email">Email:</label>
                        <input  type="email" name="email" id="email">
                    </div>
                    <div class="input-wrapper">
                        <label for="password">Password:</label>
                        <input  type="password" name="password" id="password">
                    </div>
                    <div class="input-wrapper">
                        <label for="VerifyPassword">Verify Password:</label>
                        <input  type="password" name="VerifyPassword" id="VerifyPassword">
                    </div>
                    <div class="input-wrapper">
                        <label for="role">User Type:</label>
                        <select name="role" id="role">
                            <option selected value="Candidate">Candidate</option>
                            <option value="RH">RH</option>
                        </select>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" name="checked" id="checked">
                        <p class="term-services">Creating an account means you're okay with our <span class="span-link">Terms of
                            Service</span> , <span class="span-link">Privacy Policy</span>, and our default Notification Settings.</p>
                    </div>
                    <div class="input-btn-wrapper">
                        <input type="submit" value="Create Account">
                    </div>

                   <div class="input-wrapper">
                        <p class="redirect-singIn">I do have an account <span class="singIn"><a href="./SignIn.php">Sing In</a></span></p>
                     </div>    
            </div>

        </div>
    </main>

</body>

</html>