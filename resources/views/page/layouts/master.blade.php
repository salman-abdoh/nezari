<!DOCTYPE html>
<?php
$lang =app()->getLocale() == "ar" ?'arabic.css':'main.css';
$cssf=app()->getLocale() == "ar" ?'fas fa-angle-double-left':'fas fa-angle-double-right';
?>
<html lang="{{ str_replace('_', '-', app()->getLocale())}} 
" data-textdirection="{{ str_replace('_', '-', app()->getLocale()) == 'ar'? 'rtl' : 'ltr'}}">

<head>
  <title>Nezari</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="Nezari,منتجات, drogs, Products">
  <meta name="description" content="Al-Nezari for Import is considered one of the majors medical equipment, cosmetic, pharmaceutical and body care distributors also maintenance of medical and laser devices in the territory and occupies leadership position in the area and aspired to be an agent of the best companies medical and pharmaceutical in the world">
  <meta name="author" content="salman">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href='{{ asset('animate.css/animate.css')}}'>
  <link rel="stylesheet" href='{{ asset('css/animated.min.css')}}'>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <link id="css" rel="stylesheet" href='{{ asset('css/bootstrap.css')}}'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link id="css" rel="stylesheet" href='{{ asset('css/'. $lang )}}'>
  <link href='{{ asset('fonts/fontawesome-free-6.0.0-beta3-web/css/all.css')}}' rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Tajawal:wght@500&display=swap" rel="stylesheet">

</head>

<body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
  <!-- <div class="share-box">
      <div class="the-box facebook"><i class="fab fa-facebook-f"></i></div>
      <div class="the-box linkedin"><i class="fab fa-linkedin"></i></div>
      <div class="the-box instagram"><i class="fab fa-instagram"></i></div>
      <div class="the-box twitter"><i class="fab fa-twitter"></i></div>
  </div> -->
  <!--header-->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="fa fa-arrow-up"></i></a>
  <header>
    <!-- Navbar -->

    <nav class="rows  navbar navbar-expand-lg navbar-primarys fixed-top mask-custom shadow-0 ">

      <a class=" navbar-brand  text-center p-0" href="{{ asset ('index')}}"><img src='{{ asset('img/LL.png')}}'></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavDropdown" style=" justify-content: space-around;">

        <ul class="navbar-nav  mr-auto mt-2 mt-lg-0 ">
          <li class="nav-item active">
            <a class="nav-link px-4 {{request()->is('index') ? 'active': ''}}" href="{{ asset ('index')}}">
              {{ __("Home") }} </a>
          </li>

          <li class="nav-item">
            <a class="nav-link px-4  {{request()->is('index#Products') ? 'active': ''}}" href="#products">
              {{ __("Our Products") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-4  {{request()->is('index#services') ? 'active': ''}}" href="#services">
              {{ __("Our Services") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-4  {{request()->is('contact') ? 'active': ''}}" href="{{ asset ('contact')}}">
              {{ __("Contact Us") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-4  {{request()->is('about') ? 'active': ''}}" href="{{ asset ('about')}}">
              {{ __("About Us") }}</a>
          </li>
          <div class="nav-item dropdown ">
            <a class=" nav-link dropdown-toggle" style="      color: #000000; " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __("Language") }} </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="  color: #6c757d;    background :rgba(252, 252, 252,7); text-align: center;">
              <li><a style="  text-align: center;" class="dropdown-item" href="#"> @foreach (Config::get('languages') as $lang => $language)


                  <a class="dropdown-item" style="text-align: center;font-size:14px; " href="{{ route('lang.switch', $lang) }}"><img style="    margin: 0;
    width: 23px;" src='{{ asset('img/'.$language['flag-icon'])}}'> {{$language['display']}}</a>

                  @endforeach</a></li>

            </ul>


          </div>

        </ul>


      </div>


    </nav>


    <!-- Intro -->
    <div>
      <div id="carouselExampleControls m-0 " style="        max-height: 500px;
" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner h-50 ">
          <div class="carousel-item active h-50" style="    height:500px;
">
            <div class="d-block w-100 bg-image vh-50" style="height: 500px;
                background-image: url('{{ asset('img/pexels-burst-374079.jpg')}}') ;background-size: cover;
                background-position: center; 
                  background-repeat: no-repeat;">

            </div>
            <div class="text  d-md-block m-auto">
              <h3>
                {{ __("Welcome To AL-NZARE")}}
              </h3>
            </div>


          </div>
          <div class="carousel-item h-50" style="    height: 500px;
">
            <div id="intro" class="d-block w-100 bg-image vh-50" style="height: 500px;
                background-image: url('{{asset('img/Dg3oR21X4AEpqi4.jpg')}}') ;    background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
              ">

            </div>
            <div class="text  d-md-block m-auto">
              <h3 class="text2">
                {{ __("Maintenance")}}
              </h3>
            </div>
          </div>
          <div class="carousel-item  h-50" style="    height:500px;
">
            <div class="d-block w-100 bg-image vh-50" style="height: 500px;
                background-image: url('{{ asset('img/cardiac-catheterization1.jpg')}}') ; background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover;
              ">

            </div>
            <div class="text  d-md-block m-auto">
              <h3 class="text2">
                {{ __("Medical Equipment")}}
              </h3>
            </div>


          </div>
          <div class="carousel-item  h-50" style="    height:500px;
">
            <div class="d-block w-100 bg-image vh-50" style="height: 500px;
                background-image: url('{{ asset('img/bodycare.jpg')}}') ;background-size: cover;background-position: center; 
  background-repeat: no-repeat; 
              ">
              <div class="text  d-md-block m-auto">
                <h3 class="text2">
                  {{ __("Aesthetics")}}
                </h3>
              </div>

            </div>


          </div>
        </div>

      </div>


      <!-- Intro -->

      <!--Section: Design Block-->
  </header>

  <!--end header-->

  <!--start slides-->

  <!--end slides-->
  <!--اعلانات-->

  <!--last jobs-->

  <div class="album  bg-light ">
    @yield('content')
    <!--end contact us-->
  </div>
  <!--footetr-->
  <footer class=" text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->

      <!-- Left -->

      <!-- Right -->
      <div class="foso" style="margin: auto;">
        <a href="https://wa.me/967773287037" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.facebook.com/salman.alwageeh" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/SalmanAbdoh" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="mailto:Mustafa.nezari@gmail.com" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="https://www.instagram.com/alwajeeh_salman" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.linkedin.com/in/salman-al-wageeh-37a855237/" target="_blank" class="text-decoration-none me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>

      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="fsct m-0 ">
      <div class="container  text-md-start " style="    text-align: initial;">
        <!-- Grid row -->
        <div class="row mt-3" style="    text-align: initial;">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-2.5">
              <i class="fas fa-gem me-1 "></i>
              {{ __("AL-Nezari")}}
            </h6>
            <div class="underlinedive"></div>
            <p style="margin-top: 17px; ">
              {{__('ar.aboutn')}}
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-2.5">
              {{ __("Our Categories")}}
            </h6>
            <div class="underlinedive"></div>
            <div>
              @foreach($category as $item )
              <p>
              <p class="text-reset">
                {{ $item->{app()->getLocale().('_title')} }}
              </p>
              </p>
              @endforeach
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->

          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-2.5">{{__("Contact")}}</h6>
            <div class="underlinedive text-uppercase fw-bold" style="margin-bottom: 17px;"></div>
            <div>
              <p><i class="fas fa-home me-3"></i>{{__("60TH St. ,Beside UN Head Office , Sana’a")}}</p>
              <p><i class="fas fa-phone me-3"></i>{{__("+967 1 450710")}}</p>
              <p><i class="fas fa-mobile-alt me-3"></i>{{__("+967 773 234 777 – +967 711 234 777")}}</p>
              <p><i class="fas fa-envelope me-3"></i>info@alnezari.com</p>
              <p><i class="fas fusion-li-icon fa-at me-3"></i>Mustafa.nezari@gmail.com</p>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgb(29 76 132);
    color: #f8f9fa;">
      © 2022 Copyright:salman

    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  <!--End footetr-->
  <!--java script file-->
  <script src='{{ asset('javascript/jquery-3.6.0.min.js')}}'></script>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src='{{ asset('javascript/app.js')}}'></script>



</body>


</html>