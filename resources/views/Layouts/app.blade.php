<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.css.map')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Stakeholder Mappping</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('map', 'map') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.Navbar')
        <div class="container">
       <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: lightblue">-->
  

        
  @yield('content')
        </div>
    </div>
    
    <hr>
    <section id="clients" class="wow fadeInUp">
        <div class="container">
  
          <header class="section-header">
            <h3 style="color: red" text-align="center">Partners & Clients</h3>
          </header>
  
          <div class="owl-carousel clients-carousel">
            <!--<img src="img/clients/client-1.png" alt="">-->
            <!--<img src="img/clients/client-2.png" alt="">-->
            
            <img src="/images/aecf.png" alt="">
            <img src="/images/mot.png" alt="">
            <img src="/images/msf.png" alt="">
            <img src="/images/lee.png" alt="">
            <img src="/images/ceo.png" alt="" caption="CEO SMART MONEY">
            <!--<img src="img/clients/client-4.jpeg" alt="">-->
          </div>
        </div>
      </section><!-- #clients --><br><br>
      <hr color="blue">

    <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">
    
              <div class="col-lg-3 col-md-6 footer-info">
                <h3 style="color: blue">B.I.C</h3>
                <p>We CONNECT businesses, CREATE value, SCALE businesses with expertise and capital.</p>
              </div>
    
              <div class="col-lg-3 col-md-6 footer-links">
                <h4 style="color:darkmagenta">Useful Links</h4>
                <ul>
                  <li> <a href="/">Home</a></li>
                  <li><a href="/About">About us</a></li>
                  <li> <a href="/Services">Services</a></li>
                    <li> <a href="https://bic.muni.ac.ug/">Muni University  </a></li>
                  
                </ul>
                </div>
    
              <div class="col-lg-3 col-md-6 footer-contact">
                <h4 style="color: green">Contact Us</h4>
                <p>
                  MUNI UNIVERSITY<br>
                  P.O.BOX 725<br>
                  Arua-Uganda<br>
                  <strong>Phone:</strong> +256 778213771<br>
                    <strong>Phone:</strong> +256 781 308 598<br>
                  <strong>Email:</strong> bic@muni.ac.ug<br>
                </p>
    
                <div class="social-links">
                  <a href="https://twitter.com/bic_muni" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.facebook.com/bic.muni" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.instagram.com/bic.muni" class="instagram"><i class="fa fa-instagram"></i></a>
                   <a href="https://www.youtube.com/channel/UCg4WsUo80dzWVChofb2jxSg" class="instagram"><i class="fa fa-youtube-play"></i></a>
                  <a href="https://www.linkedin.com/company/bic-muni" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    
                    <a href="https://medium.com/@bic.muni" class="linkedin"><i class="fa fa-medium"></i></a>
                
                </div>
    
              </div>
    
             <div class="col-lg-3 col-md-6 footer-newsletter">
                <h4 style="color: brown">Our Newsletter</h4>
                <p>To be able to take part in the News Letter, please subscribe below and we share and make value for information.</p>
                <form action="" method="post">
                  <input type="email" name="email"><input type="submit"  value="Subscribe">
                </form>
              </div>
    
            </div>
          </div>
        </div>
    
        <div class="container">
          <div class="copyright" style="color:deeppink">
            &copy; Copyright <strong>Sample website</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
            -->
          </div>
        </div>
    </footer><!-- #footer -->

</body>
</html>
