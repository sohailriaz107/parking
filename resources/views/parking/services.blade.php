<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Services</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;300;400;500;600;700;900&family=Raleway:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{('assets/css/style.css')}}">
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="services-page">

  @include('layout.nav')

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Services</h1>
              <p class="mb-0">Solving workplace parking problems</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="{{route('services')}}">Services</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Services Section -->
    <section id="services" class="services section">
      <div class="container">
        <div class="row gy-4">
          <!-- Service 1 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100">
              <div class="icon">
                <img class="card-img-top img-fluid" src="images/EV.jpg" alt="EV Chargers">
              </div>
              <div class="card-body">
                <h5 class="card-title">EV Chargers</h5>
                <p class="card-text">If you have electric vehicle chargers in your car park, manage their use with Parkable.</p>
                <a href="{{route('home')}}" class="btn btn-primary" onclick="openForm()">BOOK a Demo</a>
              </div>
            </div>
          </div>
          <!-- Service 2 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card h-100">
              <div class="icon">
                <img class="card-img-top img-fluid" src="images/car.jpg" alt="Slot Reservation">
              </div>
              <div class="card-body">
                <h5 class="card-title">Slot Reservation</h5>
                <p class="card-text">Efficiently reserve parking slots with our service for a hassle-free experience.</p>
                <a href="{{route('home')}}" class="btn btn-primary" onclick="openForm()">BOOK a Demo</a>
              </div>
            </div>
          </div>
          <!-- Service 3 -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card h-100">
              <div class="icon">
                <img class="card-img-top img-fluid" src="images/parking2.jpeg" alt="Advance Parking">
              </div>
              <div class="card-body">
                <h5 class="card-title">Advance Parking</h5>
                <p class="card-text">Reserve your parking space in advance, making your journey stress-free.</p>
                <a href="{{route('home')}}" class="btn btn-primary" onclick="openForm()">BOOK a Demo</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Feedback Form -->
      <div class="container">
        <div class="text-center mt-5">
          <h1 style="color:white; font-size: 24px; text-align: center;">Write Something About Our Service</h1>
          @if (Session::has('message'))
          <p class="alert alert-info">{{Session::get('message')}}</p>
          @endif
          <br>
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
          </div>
          @endif
          <form action="{{route('feedback')}}" method="post" enctype="multipart/form-data" class="php-email-form">
            @csrf
            <div class="row gy-4">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="profession" placeholder="Your profession">
              </div>
              <div class="col-md-12">
                <input type="file" class="form-control" name="image" placeholder="Image" required>
              </div>
              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>
              <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">Personal</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links d-flex justify-content-center">
        <a href="#"><i class="bi bi-twitter-x"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-skype"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="copyright">
        <span>&copy; 2024</span> <strong>Personal</strong>. All Rights Reserved.
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->


  <script src="assets/js/main.js"></script>

  <!-- Initialization -->

</body>

</html>