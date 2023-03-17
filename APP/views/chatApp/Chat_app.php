<?php    	
      session_start();
        if(!isset($_SESSION['user'])){
              header('Location: ./../Sign_in & Sign_Up/SignIn.php');
              exit;
        }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script defer src="./index.js"></script> -->
    <script defer src="../../../PUBLIC/JS/chatApp//chatApp.js"></script>
    <!-- font awesome cdn   -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../../PUBLIC/CSS/chatApp.css" />
    <title>Slider</title>
  </head>
  <body>
    <nav>
      <!-- <h2><?= $_SESSION['user']['fullName'] ?></h2> -->
    </nav>

    <main class="main">
      <div class="box">
        <!-- contact side -->
        <div class="contact-container util">

                  <!-- content profiles -->
          <div class="contacts">
               <!--contact here!  -->
          </div>

          <!-- display only on mobile -->
        </div>

        <!-- Conversation side -->
        <div class="converstion-container util">

          <!-- top -->
          <div class="conversation-contact">
            <div class="slide-btn back-btn">
              <img src="../../../PUBLIC/Images/chatApp/Arrow1.png" alt="back arrow" />
            </div>

            <div class="profile-img">
              <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" srcset="" />
            </div>
            <div class="profile-info">
              <h3 class="contact-name profile-name"></h3>
              <p class="status">Stauts now</p>
            </div>
          </div>
          <!-- end top -->
          <div class="conversation-body">
           
                 <!-- MESSAGES HERE!!  -->
          </div>

          <!-- typing input and send -->
          <form class="form">
          <div class="typing-box">
            <input
              type="text"
              name="contact"
             id="send-input" 
              placeholder="message ...."
            />
            <!-- add the icon input in here!! -->
           <button class='sendBtn'>
            <div class="typing-icon" >
              <img src="../../../PUBLIC/Images/chatApp/paper-plane-solid1.png" alt="" srcset="" />
            </div>
          </button>
          </div>
  </form>
          <!-- end of the search and send? -->
        </div>
      </div>
    </main>
  </body>
</html>

