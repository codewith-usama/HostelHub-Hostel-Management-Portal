<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="front-end-style.css">
  <link rel="stylesheet" href="about-style.css">
  <link rel="shortcut icon" href="favicon.ico">
  <script src="https://kit.fontawesome.com/830a36410b.js" crossorigin="anonymous"></script>
  <title>HOME | HOSTEL MANAGMENT</title>
</head>

<body>
  <?php include('errors.php'); ?>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>H</span>ostel <span>Ma</span>nagment</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="#about" data-after="About">About</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <img src="background-fron-end.jpg" class="bg"alt="HOSTEL Image">
    <div class="hero container">
      <div>
        <h1>Welcome<span></span></h1>
        <h1>To HOSTEL MANAGEMENT<span></span></h1>
        <h1 class="login"> <a href="student_warden_login.php">Click here to login</a><span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Hos<span>te</span>ls</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti maiores pariatur assumenda quas
          magni et, doloribus quod voluptate quasi molestiae magnam officiis dolorum, dolor provident atque molestias
          voluptatum explicabo!</p>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Arain Boys Hostel</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Paradise Hostel</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>United Boys hostel</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
    </div>
  </section>
  <!-- End Service Section -->


  <!-- About Section -->

  <section id="about">
    <div class="about-section">
     <h1>About Us</h1>
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
       aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
       Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
       occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
         aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
         occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

  </section>
  <!-- About Section Ends -->

    <!-- Footer -->

  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>H</span>ostel <span>Ma</span>nagment</h1>
      </div>
      <p>Copyright © 2022 FAST. All rights reserved</p>
      <p align="center">
<a href = "#"><img src='https://img.icons8.com/color/48/000000/gmail.png' alt='gmail' height='35'></a>
<a href = "#"><img src='https://img.icons8.com/color/2x/twitter.png' alt='twitter' height='35'></a>
<a href = "#"><img src='https://img.icons8.com/color/2x/facebook-new.png' alt='facebook' height='35'></a>
<a href = "#"><img src='https://cdn.icon-icons.com/icons2/1826/PNG/512/4202090instagramlogosocialsocialmedia-115598_115703.png' alt='instagram' height='35'></a>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>

</body>

</html>
