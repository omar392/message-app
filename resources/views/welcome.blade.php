<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css"
        integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <meta name="theme-color" content="#2F4858">
    <title>رسائل</title>
</head>

<body>
<!-- start loader -->
 <div class="loader-cont">
    <div class="square-ball ballone"></div>
    <div class="square-ball balltwo"></div>
    <div class="square-ball ballthree"></div>

    </div>
    <div class="loader-one"></div>
    <div class="loader-two"></div>
<!-- End loader -->


    <!--start  up to top -->
    <div class="up" onclick="topFunction()" id="myBtn">
        <i class="fa fa-caret-up" aria-hidden="true"></i>
    </div>
 <!-- end up to top -->


<!-- start list of mob -->
<div class="list-mob">
    <div class="close">x</div>
         <ul class="nav-ul">
                        <li><a href="#home" class="hvr-underline-from-left">الرئيسية</a></li> <hr>
                        <li><a href="#pages" class="hvr-underline-from-left">صفحات التطبيق </a></li><hr>
                        <li><a href="#footer" class="hvr-underline-from-left">الرئيسية</a></li>
                    </ul>
</div>
<!-- End list of mob -->


    <!-- start Navbar -->
    <div class="navbar">
        <div class="container">
            <div class="nav-contant">
                <div class="brand">
                    <div class="logo">
                        <a href="{{ route('website') }}"><img class="img-fluid" src="{{ asset('frontend/img/logo.png') }}"></a>
                    </div>
                </div>

                <div class="content_nav">
                    <ul class="nav-ul">
                        <li><a href="#home" class="hvr-underline-from-left">الرئيسية</a></li>
                        <li><a href="#pages" class="hvr-underline-from-left">صفحات التطبيق </a></li>
                        <li><a href="#footer" class="hvr-underline-from-left">حمل الأن </a></li>
                    </ul>
                </div>
            </div>

            <div class="menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
    <!-- End Navbar -->



    <!-- start Home -->
    <div class="home" id="home">
        <div class="container">
            <div class="slider_home ">
                <div class="item-home">
                    <div class="row">
                        <div class="col-lg-6 cont-text-home">
                            <h1 class="h-home">هذا النص هو مثال لنص
                                يمكن أن يستبدل</h1>
                            <p class="p-home">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                                من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة </p>
                            <div class="app">
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/1200px-Apple_logo_black.sv') }}g.png" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>App Store</h5>
                                    </div>

                                </a>
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/Google_Play_symbol.svg.png') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>Google Play</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6  cont-img-home">
                            <img src="./img/home-slider.png" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="item-home">
                    <div class="row">
                        <div class="col-lg-6  cont-text-home">
                            <h1 class="h-home">هذا النص هو مثال لنص
                                يمكن أن يستبدل</h1>
                            <p class="p-home">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                                من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة </p>
                            <div class="app">
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/1200px-Apple_logo_black.svg.png') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>App Store</h5>
                                    </div>

                                </a>
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/Google_Play_symbol.svg.png') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>Google Play</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6  cont-img-home">
                            <img src="{{ asset('frontend/img/home-slider.png') }}" class="img-fluid">
                        </div>
                    </div>

                </div>
                <div class="item-home">
                    <div class="row">
                        <div class="col-lg-6  cont-text-home">
                            <h1 class="h-home">هذا النص هو مثال لنص
                                يمكن أن يستبدل</h1>
                            <p class="p-home">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                                من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص
                                هو مثال لنص يمكن أن يستبدل في نفس المساحة </p>
                            <div class="app">
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/1200px-Apple_logo_black.svg.png') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>App Store</h5>
                                    </div>

                                </a>
                                <a href="#" class="app-down">
                                    <div class="app-icon">
                                        <img src="{{ asset('frontend/img/Google_Play_symbol.svg.png') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <p>حمل الآن</p>
                                        <h5>Google Play</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6  cont-img-home">
                            <img src="{{ asset('frontend/img/home-slider.png') }}" class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Home -->




    <!-- start Application pages -->
    <div class="Application-pages" id="pages">
        <div class="container">
            <div class="heading-title wow animate__backInLeft " data-wow-duration="1s"  data-wow-offset="200" data-wow-delay="0">
                <h4 class="heading-h">صفحات التطبيق</h4>
                <p class="heading-p">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                    يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
                </p>
            </div>


        </div>
        <div class="contant-application wow animate__fadeInUp" data-wow-duration="1s"  data-wow-offset="250" data-wow-delay="0">
            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/soft 3.png') }}" alt="">
            </div>
            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/soft-5.png') }}" alt="">
            </div>
            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/soft-screen 2.png') }}" alt="">
            </div>

            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/soft-6.png') }}" alt="">
            </div>

            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/screen.png') }}" alt="">
            </div>
            <div class="img-pages last">
                <img src="{{ asset('frontend/img/Glass.png') }}" class="glass" alt="">
                <img src="{{ asset('frontend/img/6.png') }}" alt="">
            </div>


        </div>
    </div>
    <!-- End Application pages -->

   <!-- start footer -->
   <footer id="footer">
       <div class="container">
     <div class="row">
         <div class="col-lg-6">
            <h1 class="footer-h wow animate__flipInX"  data-wow-duration="1s"  data-wow-offset="250" data-wow-delay="0" >حمل التطبيق الان</h1>
            <p class="footer-p wow animate__fadeIn" data-wow-duration="1s"  data-wow-offset="250" data-wow-delay="0" >هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة </p>
            <div class="app">
              <a href="#" class="app-down">
                  <div class="app-icon">
                      <img src="{{ asset('frontend/img/1200px-Apple_logo_black.svg.png') }}" alt="">
                  </div>
                  <div class="app-text">
                      <p>حمل الآن</p>
                      <h5>App Store</h5>
                  </div>

              </a>
              <a href="#" class="app-down">
                  <div class="app-icon">
                      <img src="{{ asset('frontend/img/Google_Play_symbol.svg.png') }}" alt="">
                  </div>
                  <div class="app-text">
                      <p>حمل الآن</p>
                      <h5>Google Play</h5>
                  </div>
              </a>
          </div>
         </div>
         <div class="col-lg-6">
           <img src="{{ asset('frontend/img/footer-p.png') }}" class="img-fluid" alt="">
         </div>
     </div>
       </div>
   </footer>
   <!-- End footer -->

<!-- start navfooter -->
<div class="navfooter">
    <div class="container">
        <div class="cont-footer-nav">
            <div class="list-nav">

                  <p>
                    جميع الحقوق محفوظة  <a class="link-soft" href="https://www.softsteps.com.sa">SoftSteps</a>  © 2021
                </p>

            </div>
            <div class="icon-nav">
                <div class="icon-social ">
                    <a href="#" class=""> <i class="fab fa-youtube"></i></a>

                    </div>
                    <div class="icon-social">
                      <a href="#">  <i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="icon-social">
                      <a href="#">   <i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="icon-social">
                      <a href="#"> <i class="fab fa-facebook-f"></i></a>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- End navfooter -->

    <!-- ------------------------------------------------------- -->
    <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script>
        new WOW().init()
    </script>
</body>
</html>
