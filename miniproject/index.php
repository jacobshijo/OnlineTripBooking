<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookify - Online Trip Booking Hub</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <?php
    if(!isset($_SESSION["username"])) {
      include("header/headerindexLoggedOut.php");
    }
    else {
      include("header/headerindexLoggedIn.php");
    }
  ?>


  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore world</h2>

          <p class="hero-text">
          Discover unforgettable destinations and create memories that last a lifetime.
          </p>

          <div class="btn-group">
            <a href="#destination" class="btn btn-primary">Learn more</a>
            <a href="bookingPage.php" class="btn btn-secondary">Book now</a>
          </div>

        </div>
      </section>

      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Uncover place</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
          Explore the most sought-after destinations around India.
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/popular-1.jpg" alt="Calangute Beach, Goa" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Goa</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Calangute Beach</a>
                  </h3>

                  <p class="card-text">
                  Embrace the vibrant charm and golden sands of Calangute Beach, Goa's lively coastal paradise.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/popular-2.jpg" alt="Munnar, Idukki" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Idukki</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Munnar</a>
                  </h3>

                  <p class="card-text">
                  Escape to Munnar, a serene hill station adorned with lush tea gardens and misty mountains.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/popular-3.jpg" alt="Taj Mahal, Agra" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Agra</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Taj Mahal</a>
                  </h3>

                  <p class="card-text">
                  Discover the timeless beauty of the Taj Mahal, a symbol of love and architectural marvel.
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PACKAGE
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Hotels</p>

          <h2 class="h2 section-title">Famous Hotels</h2>

          <p class="section-text">
          Find the perfect hotel for your trip.
          </p>

          <ul class="package-list">

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./assets/images/hotel-1.jpg" alt="Fairmont, Jaipur" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Fairmont, Jaipur</h3>

                  <p class="card-text">
                  Experience royal luxury and timeless elegance in the heart of Jaipur's Aravalli hills.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Jaipur</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(643 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    ₹29,999/-
                    <span>/ per night</span>
                  </p>

                  <a href="hotels.php" class="btn btn-secondary">Book now</a>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./assets/images/hotel-2.jpg" alt="W, Goa" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Six Senses Fort Barwara</h3>

                  <p class="card-text">
                  Indulge in heritage luxury and wellness at the stunning Six Senses Fort Barwara.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Rajasthan</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(568 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    ₹27,999/-
                    <span>/ per night</span>
                  </p>

                  <a href="hotels.php" class="btn btn-secondary">Book now</a>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./assets/images/hotel-3.png" alt="Presidency Airport Hotel, Cochin" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Presidency Airport Hotel, Cochin</h3>

                  <p class="card-text">
                  Convenient comfort meets modern elegance at Presidency Airport Hotel.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Kerala</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(389 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    ₹4,999/-
                    <span>/ per night</span>
                  </p>

                  <a href="hotels.php" class="btn btn-secondary">Book now</a>

                </div>

              </div>
            </li>

          </ul>

          <button class="btn btn-primary" onclick="window.location.href='hotels.php'">View all Hotels</button>

        </div>
      </section>





      <!-- 
        - #GALLERY
      -->

      <section class="gallery" id="gallery">
        <div class="container">

          <p class="section-subtitle">Photo Gallery</p>

          <h2 class="h2 section-title">Photo's From Travellers</h2>

          <p class="section-text">
          Capture the moments and memories shared by travelers from around the world.
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-1.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-2.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-3.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-4.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-5.jpg" alt="Gallery image">
              </figure>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
            Get ready for unforgettable journeys. 
            <br>
            Make memories that last a lifetime with us!
            <br><br>
            <b>Wherever you go we are there!</b>
            </p>
          </div>

          <a href="contactUs.php" class="btn btn-secondary">Give Feedback</a>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <?php include("header/footer.php");?>


  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>