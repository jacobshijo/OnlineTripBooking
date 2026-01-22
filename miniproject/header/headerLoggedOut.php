<style>
        .user-profile {
            display: flex;
            align-items: center;
            gap: 8px; /* Reduced gap */
            background-color: transparent;
            padding: 8px 12px; /* Reduced padding */
            border-radius: 8px; /* Reduced border radius */
            box-shadow: none; /* Lighter shadow */
            max-width: 250px; /* Reduced max width */
            margin: 15px auto;
            font-family: Arial, sans-serif;
        }

        .profile-pic {
            width: 40px; /* Reduced size */
            height: 40px; /* Reduced size */
            border-radius: 50%;
            object-fit: cover;
            border: 0px solid #ccc;
        }

        .user-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px; /* Reduced gap */
        }

        .user-name {
            font-size: 14px; /* Reduced font size */
            font-weight: bold;
            margin: 0;
            color: whitesmoke;
        }
    </style>

<header class="header" data-header>
  <div class="overlay" data-overlay></div>

  <div class="header-top">
    <div class="container">
      <div class="helpline-box">
        <div class="icon-box">
          <ion-icon name="call-outline"></ion-icon>
        </div>
        <div class="wrapper">
          <p class="helpline-title">For Further Inquiries :</p>
          <p class="helpline-number">+91 96892 74204</p>
        </div>
      </div>

      <!-- Logo section without <center> tag -->
      <a href="#" class="logo">
        <img src="./assets/images/logo.png" alt="Bookify logo" style="max-width: 100%; height: 82px;">
      </a>

      <div class="header-btn-group">
      <div class="user-profile">
      <a href="login.php">
    <img src="images/profile.png" alt="User Profile" class="profile-pic">
</a>
    <div class="user-details">
    <p class="user-name">
    <?php echo "Guest"; ?>
</p>

    </div>
</div>
        <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
          <ion-icon name="menu-outline"></ion-icon>
        </button>
      </div>
    </div>
  </div>

  <div class="header-bottom">
    <div class="container">
    <ul class="social-list">
        <li><a href="https://www.facebook.com/" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="https://x.com/" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="https://youtube.com/" class="social-link"><ion-icon name="logo-youtube"></ion-icon></a></li>
      </ul>

      <nav class="navbar" data-navbar>
        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
          </a>
          <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">
          <li><a href="./index.php" class="navbar-link" data-nav-link>home</a></li>
          <li><a href="aboutUs.php" class="navbar-link" data-nav-link>about us</a></li>
          <li><a href="./#destination" class="navbar-link" data-nav-link>destination</a></li>
          <li><a href="./#package" class="navbar-link" data-nav-link>hotels</a></li>
          <li><a href="./#gallery" class="navbar-link" data-nav-link>gallery</a></li>
          <li><a href="./#contact" class="navbar-link" data-nav-link>contact us</a></li>
        </ul>
      </nav>

      <div class="btn-group">
  <a href="bookingPage.php" class="btn btn-primary">Book Now</a>
  <a href="login.php" class="btn btn-primary">Login/Signup</a>
</div>


    </div>
  </div>
</header>
