<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Homepage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto navbar navbar-expand-lg fixed-start py-lg-0">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="<?= site_url('home'); ?>" class="scrollto"><img src="assets/img/logobims.png" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar ml-auto nav navbar-nav navbar-right">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#howtoregister">About</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      <a class="buy-tickets scrollto" href="<?= site_url('auth'); ?>"> Login </a>
      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Complaint <br><span>Management</span> System</h1>
      <h1>Barangay 386 |<span> Quiapo Manila </span></h1>
      <h7> Report any incidents that are troubling and that can harm the environment for a better environment.

</h7>
      <p> </p>
      <p> </p>
      
      
     
      <a href="<?= site_url('auth'); ?>" class="about-btn scrollto ">Sign In to Report <i class="fas fa-sign-in-alt"></i></a> <!-- ======= Sign-In Report ======= -->
    
    </div>
  </section><!-- End Hero Section -->
 
  <main id="main">
    

   <!-- FAQ section -->
   <div class="section-header">
          <h2>FAQ's</h2>
          <p>How can we help you?</p>
        </div>
    
        <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">

            
<div class="container-faq container-md">


  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
      Who to Contact?
      </a>
    </h3>
    </div>
    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
    <div class="panel-body px-3 mb-4">
      <p>For further questions regarding on your concern, you can contact our dear Secretary, </a> <h3>Mr. Sabulao Jelbie.</p>
    </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
      How to Register? 
      </a>
    </h3>
    </div>
    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
    <div class="panel-body px-3 mb-4">
      <p>To register just simply follow the step provided : </p><a class="small" href="#howtoregister">Click-Here</a>
    </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
      How to register if not a resident? 
      </a>
    </h3>
    </div>
    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
    <div class="panel-body px-3 mb-4">
      <p>If you are not a resident you are not able to register in our system, if you want to register, you can ask to the nearest barangay
          to make you a resident first before you can register.</p>
    </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
      How to report?
      </a>
    </h3>
    </div>
    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
    <div class="panel-body px-3 mb-4">
      <p>To report you can follow the steps provided:</p> <a href="#howtoreport">Click-Here</a>
    </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
      Can I access this on mobile?
      </a>
    </h3>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
    <div class="panel-body px-3 mb-4">
      <p>Absolutely!, our website is a multi-platform and it can be access both mobile and computer.</p>
    </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
    <h3 class="panel-title">
      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
      Can I only access the website using internet?
      </a>
    </h3>
    </div>
    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
    <div class="panel-body px-3 mb-4">
      <p>Yes, only with access through internet can use our website.</p>
    </div>
    </div>
  </div>




  </div>

</div>
</section>

    <!-- ======= Register Section ======= -->
    <section id="howtoregister">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          <h2>How to register?</h2>
          <p>Follow the steps in the images how to register.</p>
          <p></p>
          </div>

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/ins/2.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/ins/3.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/ins/4.png" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/ins/5.png" alt="Fourth slide">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            
        </div>
      

    </section><!-- End Register Section -->
    <section id="howtoreport">
    <div class="section-header">
          <h2>HOW TO REPORT?</h2>
          <p>Steps to follow to report.</p>
    </div>
    <div class="">
    <center> 
      <img class="d-block w-50" src="assets/img/ins/report-ins.png" alt="Fifth slide" >
      </center>
        </div>
</section>

   

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>ORGANIZATIONAL CHART</h2>
          <p>Here are some of our beloved barangay officials</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/p-icon.jpg" alt="Speaker 1" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/p-icon.jpg" alt="Speaker 2" class="img-fluid">
              <div class="details">
              <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
              <img src="assets/img/p-icon.jpg" alt="Speaker 3" class="img-fluid">
              <div class="details">
              <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/p-icon.jpg" alt="Speaker 4" class="img-fluid">
              <div class="details">
              <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/p-icon.jpg" alt="Speaker 5" class="img-fluid">
              <div class="details">
              <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="300">
              <img src="assets/img/p-icon.jpg" alt="Speaker 6" class="img-fluid">
              <div class="details">
              <h3><a href="speaker-details.html">Official</a></h3>
                <p>Position</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Speakers Section -->
 
  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logobims.png" alt="">
            <p>The general objective of this study was to develop and design BIMS that would help the barangay to monitor and observe the status of 
              complained cases filed in their barangay would result in an efficient implementation of peace and order in the barangay.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Barangay 386 Zone 39 District III<br>
              Quaipo Manila<br>
              Philippines <br>
              <strong>Phone:</strong> +639 0921-3981-287<br>
              <strong>Email:</strong> brgy386@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              
              
            </div>

          </div>

        </div>
      </div>
    </div>

    
  </footer><!-- End  Footer -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
