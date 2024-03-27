<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GSB - Gestion des frais</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  <!-- =======================================================
  * Template Name: Medicio - v4.1.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto text-light">GSB</a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <?php 
          if(isset($_SESSION["login"])){
            echo '<li><a class="nav-link scrollto" href="deconnect.php">Se deconnecter  </a></li>';
          }
          ?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->



    </div>
  </header>
  <!-- End Header -->

  <main id="main">
      <?php 
      if(!isset($_SESSION['login'])){
        echo $contenu; 
      }
      else{
        ?>
      
    
      <section id="departments" class="departments">
      <div class="container">
        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100"> -->
        
        <div class="row ">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <ul class="nav nav-tabs flex-column">
              <li class="mb-4 fw-bold border-bottom pb-2">

              <?php if(isset($_SESSION['login'])){
              echo $_SESSION['prenom'].' '.$_SESSION['nom'];   } ?>
             <br> <span class="fw-light"> <?php echo $_SESSION['login'] ;?> </span></li>
             <?php 
             if($_SESSION['login']=='Visiteur médical'){
              ?>
              <li class="nav-item">
                <a href='accueil'class="nav-link" >
                  <h4>Accueil</h4>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a href='saisie' class="nav-link">
                  <h4>Saisie fiche de frais</h4>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a href='fiche' class="nav-link">
                  <h4>Mes fiches de frais</h4>
                </a>
              </li>

            <?php  }
            elseif($_SESSION['login']=='Comptable'){
               ?>

             
              <li class="nav-item mt-2">
                <a href='valider' class="nav-link">
                  <h4>Valider fiche de frais</h4>
                </a>
              </li>

            <?php } 
             elseif($_SESSION['login']=='Admin'){
              ?>

              
              <li class="nav-item mt-2">
                <a href='admin' class="nav-link">
                  <h4>Utilisateurs</h4>
                </a>
              </li>         
            
           <?php } ?>
            </ul>
          </div>
          
          <div class="col-lg-8 p-4" style="background-color: #ececec">
          <?php echo $contenu; ?>
          </div>

        </div>
        </div>
    </section>
    
  <?php } ?>
   
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GSB</span></strong>. All Rights Reserved
      </div>
      <div class="credits"> 
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>