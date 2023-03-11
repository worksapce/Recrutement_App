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
      <h2>Logo</h2>
    </nav>

    <main class="main">
      <div class="box">
        <!-- contact side -->
        <div class="contact-container util">
          <!-- searcher  -->
          <div class="search-box">
            <input
              type="search"
              name="contact"
              id="contact"
              placeholder="search contact"
            />
            <!-- add the icon search in here!! -->
            <div class="search-icon">
              <i class="fas fa-search" style="color: #fff"></i>
            </div>
          </div>
          <!-- content profiles -->
          <div class="contacts">
            <!-- single contact profile -->
            <!-- <div class="single-contact">
              <div class="profile-img">
                <img src="../../../PUBLIC/Images/chatApp/profile-img1.png" alt="profile-img" />
              </div>
              <div class="profile-info">
                <h3 class="contact-name">Oussama Jodar</h3>
                <p class="last-msg">
                  I’m a student in fsts , and working on this design
                </p>
              </div>
            </div> -->
          </div>

          <!-- display only on mobile -->
        </div>

        <!-- Conversation side -->
        <div class="converstion-container util">
          <!-- display Only on mobile:back-aron -->

          <!-- top -->
          <div class="conversation-contact">
            <div class="slide-btn back-btn">
              <img src="../../../PUBLIC/Images/chatApp/Arrow1.png" alt="back arrow" />
            </div>

            <div class="profile-img">
              <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" srcset="" />
            </div>
            <div class="profile-info">
              <h3 class="contact-name profile-name">Oussama Jodar</h3>
              <p class="status">Stauts now</p>
            </div>
          </div>
          <!-- end top -->
          <div class="conversation-body">
            <div class="receiver-box">
              <div class="profile-img">
                <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" srcset="" />
              </div>
              <div class="">
                <div class="receiver-info">
                  <h3 class="receiver-name">Oussama Jodar</h3>
                  <p class="status">12 PM</p>
                </div>
                <div class="receiver-msg">
                  <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Vitae temporibus natus fugit dolor esse itaque est porro,
                    nisi, reiciendis, ipsa facere dolorem. Unde illo eveniet aut
                    architecto maxime voluptate est, optio, aspernatur error
                    aperiam aliquam! Nulla dolores doloribus expedita.
                  </p>
                </div>
              </div>
            </div>

            <!--  -->
            <div class="receiver-box">
              <div class="profile-img">
                <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" srcset="" />
              </div>
              <div class="">
                <div class="receiver-info">
                  <h3 class="receiver-name">Oussama Jodar</h3>
                  <p class="status">12 PM</p>
                </div>
                <div class="receiver-msg">
                  <p>Lorem, ipsum dolor.</p>
                </div>
              </div>
            </div>
            <!-- end of rec box  -->
            <div class="receiver-box">
              <div class="profile-img">
                <img src="../../../PUBLIC/Images/chatApp/pexels-photo-771742.jpeg" alt="" srcset="" />
              </div>
              <div class="">
                <div class="receiver-info">
                  <h3 class="receiver-name">Oussama Jodar</h3>
                  <p class="status">12 PM</p>
                </div>
                <div class="receiver-msg">
                  <p>Lorem, ipsum dolor.</p>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="receiver-msg-single">
              <p>Lorem, ipsum dolor.</p>
            </div>
            <div class="receiver-msg-single">
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Placeat, explicabo qui officiis mollitia esse illum
                exercitationem voluptatibus. Quam, dolores mollitia?
              </p>
            </div>
            <!-- end of the reciver box -->
            <!-- sender-container -->
            <div class="sender-container">
              <div class="sender-box">
                <div class="">
                  <div class="sender-info">
                    <h3 class="sender-name">Oussama Jodar</h3>
                    <p class="sender-date">12 PM</p>
                  </div>
                  <div class="sender-msg">
                    <p>Lorem, ipsum dolor.</p>
                  </div>
                </div>
                <div class="profile-img">
                  <img
                    src="../../../PUBLIC/Images/chatApp/profile-img1.png"
                    alt=""
                    srcset=""
                  />
                </div>
              </div>
            </div>
            <div class="sender-single-msg-wraper">
              <div class="sender-msg-single">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni
                  reprehenderit voluptates dolore.
                </p>
              </div>
            </div>
            <!-- end signle message -->
          </div>

          <!-- typing input and send -->
          <div class="typing-box">
            <input
              type="text"
              name="contact"
              id="contact"
              placeholder="search contact"
            />
            <!-- add the icon search in here!! -->
            <div class="typing-icon">
              <img src="../../../PUBLIC/Images/chatApp/paper-plane-solid1.png" alt="" srcset="" />
            </div>
          </div>
          <!-- end of the search and send? -->
        </div>
      </div>
    </main>
  </body>
</html>

