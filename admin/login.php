<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script> -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-brands/css/uicons-brands.css'>

    <link rel="stylesheet" href="./css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="#" class="sign-in-form">

            <h2 class="title">Sign in</h2>

            <div class="input-field size_input">
              <!-- <i class="fas fa-user"></i> -->
              <i class="fi fi-ss-user"></i>
              <input type="text" placeholder="Username" />
            </div>

            <div class="input-field size_input">
              <!-- <i class="fas fa-lock"></i> -->
              <i class="fi fi-ss-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            
            <input type="submit" value="Login" class="btn solid" />

            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-facebook-f"></i> -->
                <i class="fi fi-brands-facebook"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-twitter"></i> -->
                <i class="fi fi-brands-twitter-alt-circle"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-google"></i> -->
                <i class="fi fi-brands-google"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-linkedin-in"></i> -->
                <i class="fi fi-brands-linkedin"></i>
              </a>
            </div>

          </form>

          <!-- -==============================-------------------- -->

          <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="form_grid">

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-user"></i> -->
                      <i class="fi fi-ss-user"></i>
                      <input type="text" placeholder="Username" />
                    </div>

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-envelope"></i> -->
                      <i class="fi fi-ss-envelope"></i>
                      <input type="email" placeholder="Email" />
                    </div>

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-lock"></i> -->
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Password" />
                    </div>

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-lock"></i> -->
                      <i class="fi fi-ss-lock"></i>
                      <input type="password" placeholder="Confirm Password" />
                    </div>

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-user"></i> -->
                      <i class="fi fi-ss-house-chimney"></i>
                      <input type="text" placeholder="Address" />
                    </div>

                    <div class="input-field size_input">
                      <!-- <i class="fas fa-user"></i> -->
                      <i class="fi fi-rr-smartphone"></i>
                      <input type="text" placeholder="Mobile" />
                    </div>

                    <div class="input-field reg_img">
                      <!-- <i class="fas fa-user"></i> -->
                      <i class="fi fi-ss-cloud-upload-alt"></i>
                      <input type="file" name="" id="" class="reg_img_input">
                    </div>

          </div>

            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>

            <div class="social-media">
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-facebook-f"></i> -->
                <i class="fi fi-brands-facebook"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-twitter"></i> -->
                <i class="fi fi-brands-twitter-alt-circle"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-google"></i> -->
                <i class="fi fi-brands-google"></i>
              </a>
              <a href="#" class="social-icon">
                <!-- <i class="fab fa-linkedin-in"></i> -->
                <i class="fi fi-brands-linkedin"></i>
              </a>
            </div>

          </form>
          
        </div>
      </div>

      <div class="panels-container">

        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="./img/login.svg" class="image" alt="" />
        </div>
        
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="./img/re.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="./js/login.js"></script>
  </body>
</html>
