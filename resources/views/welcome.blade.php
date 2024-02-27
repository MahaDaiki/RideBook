<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RideBook</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet" />
        <!-- responsive style -->
        <link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        

        <!-- Styles -->
        
    </head>
    <body class="antialiased " style="  background: linear-gradient(to bottom right, #ffffff, #f7c621);">
     
            <header class="header_section">
              <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ '/' }}">
                    <span>
                     RideBook
                    </span>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">☰</span>
                  </button>
        
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                      @if (Route::has('login'))
                      <ul class="navbar-nav  ">
                        @auth
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/dashboard') }}"> Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}"> LogIn </a>
                        </li>
                        <li class="nav-item">
                          @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}" > Register</a>
                             @endif
                        </li>
                        
                      </ul>
                     
                      @endauth
                  </div>
              @endif
                    </div>
                  </div>
                </nav>
              </div>
            </header>
                <!-- end header section -->
                <!-- slider section -->
                <section class=" slider_section ">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-7 ">
                        <div class="box">
                          <div class="detail-box">
                            <h4>
                              Welcome to
                            </h4>
                            <h1>
                             RideBook
                            </h1>
                          </div>
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
            
                                <div class="img-box">
                                  <img src="{{ asset('images/slider-img.png')}}" alt="">
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="img-box">
                                  <img src="{{ asset('images/slider-img.png')}}" alt="">
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="img-box">
                                  <img src="{{ asset('images/slider-img.png')}}" alt="">
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="img-box">
                                  <img src="{{ asset('images/slider-img.png')}}" alt="">
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="img-box">
                                  <img src="{{ asset('images/slider-img.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
            
                          <div class="btn-box">
                            <a href="" class="btn-1">
                              Read More
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-5 ">
                        <div class="slider_form">
                          <h4>
                            Get A Taxi Now
                          </h4>
                          <form method="post" action="{{ route('search.route') }}">
                            @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                            @csrf
                            <label for="start_city" class="text-warning">Start City:</label>
                            <select name="start_city" id="start_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        <div>
                            <label for="end_city" class="text-warning">End City:</label>
                            <select name="end_city" id="end_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                          </div>
                            <input type="date" name="schedule" id="schedule" required>
                            <input type="number" placeholder="Number Of People" required>
                            <div class="btm_input">
                              <button>Search</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            
                </section>
                <!-- end slider section -->
              </div>
            
              <!-- about section -->
            
              <section class="about_section layout_padding">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-4 col-md-5 offset-lg-2 offset-md-1">
                      <div class="detail-box">
                        <h2>
                          About <br>
                          Taxi Company
                        </h2>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniamm
                        </p>
                        <a href="">
                          Read More
                        </a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="img-box">
                        <img src="{{ asset('images/about-img.png')}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
              <!-- end about section -->
            
              <!-- service section -->
            
              <section class="service_section layout_padding">
                <div class="container">
                  <div class="heading_container">
                    <h2>
                      Our <br>
                      Taxi Services
                    </h2>
                  </div>
                  <div class="service_container">
                    <div class="box">
                      <div class="img-box">
                        <img src="{{ asset('images/delivery-man.png')}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h5>
                          Private Driver
                        </h5>
                        <p>
                          Lorem ipsum dolor sit ame
                        </p>
                        <a href="">
                          Read More
                        </a>
                      </div>
                    </div>
                    <div class="box">
                      <div class="img-box">
                        <img src="{{ asset('images/airplane.png')}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h5>
                          Airport Transfer
                        </h5>
                        <p>
                          Lorem ipsum dolor sit ame
                        </p>
                        <a href="">
                          Read More
                        </a>
                      </div>
                    </div>
                    <div class="box">
                      <div class="img-box">
                        <img src="images/backpack.png" alt="">
                      </div>
                      <div class="detail-box">
                        <h5>
                          Luggage Transfer
                        </h5>
                        <p>
                          Lorem ipsum dolor sit ame
                        </p>
                        <a href="">
                          Read More
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
              <!-- end service section -->
            
              <!-- news section -->
            
              <section class="news_section layout_padding">
                <div class="container">
                  <div class="heading_container">
                    <h2>
                      Our <br>
                      News
                    </h2>
                  </div>
                  <div class="news_container">
                    <div class="box">
                      <div class="date-box">
                        <h6>
                          01 Nov 2023
                        </h6>
                      </div>
                      <div class="img-box">
                        <img src="{{ asset('images/news-img.jpg')}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h6>
                          Eiusmod tempor incididunt
                        </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        </p>
                      </div>
                    </div>
                    <div class="box">
                      <div class="date-box">
                        <h6>
                          01 Nov 2023
                        </h6>
                      </div>
                      <div class="img-box">
                        <img src="{{ asset('images/news-img.jpg')}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h6>
                          Eiusmod tempor incididunt
                        </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        </p>
                      </div>
                    </div>
                    <div class="box">
                      <div class="date-box">
                        <h6>
                          01 Nov 2023
                        </h6>
                      </div>
                      <div class="img-box">
                        <img src="{{ asset('images/news-img.jpg')}}" alt="">
                      </div>
                      <div class="detail-box">
                        <h6>
                          Eiusmod tempor incididunt
                        </h6>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
              <!-- end news section -->
            
              <!-- client section -->
            
              <section class="client_section layout_padding-bottom">
                <div class="container">
                  <div class="heading_container">
                    <h2>
                      What <br>
                      Client <br>
                      Says
                    </h2>
                  </div>
                  <div class="client_container">
                    <div class="carousel-wrap ">
                      <div class="owl-carousel">
                        <div class="item">
                          <div class="box">
                            <div class="img-box">
                              <img src="{{ asset('images/client-1.png')}}" alt="">
                            </div>
                            <div class="detail-box">
                              <h3>
                                Aliqua
                              </h3>
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et amet, consectetur adipiscing
                              </p>
                              <img src="{{ asset('images/quote.png')}}" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="box">
                            <div class="img-box">
                              <img src="{{ asset('images/client-2.png')}}" alt="">
                            </div>
                            <div class="detail-box">
                              <h3>
                                Liqua
                              </h3>
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et amet, consectetur adipiscing
                              </p>
                              <img src="{{ asset('images/quote.png')}}" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
              <!-- end client section -->
            
              <!-- contact section -->
            
              <section class="contact_section layout_padding-bottom">
                <div class="container">
                  <div class="heading_container">
                    <h2>
                      Any Problems <br>
                      Any Questions
                    </h2>
                  </div>
                </div>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-5  offset-md-1">
                      <div class="contact_form">
                        <h4>
                          Get In touch
                        </h4>
                        <form action="">
                          <input type="text" placeholder="Name">
                          <input type="text" placeholder="Phone Number">
                          <input type="text" placeholder="Message" class="message_input">
                          <button>Send</button>
                        </form>
                      </div>
                    </div>
                    <div class="col-md-6 px-0">
                      <div class="img-box">
                        <img src="{{ asset('images/contact-img.png')}}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end contact section -->
     
            
              <!-- why section -->
            
              <section class="why_section layout_padding">
                <div class="container">
                  <div class="heading_container">
                    <h2>
                      Why <br>
                      Choose Us
                    </h2>
                  </div>
                  <div class="why_container">
                    <div class="box">
                      <div class="img-box">
                        <img src="{{ asset('images/delivery-man-white.png')}}" alt="" class="img-1">
                        <img src="{{ asset('images/delivery-man-black.png')}}" alt="" class="img-2">
                      </div>
                      <div class="detail-box">
                        <h5>
                          Best Drivers
                        </h5>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        </p>
                      </div>
                    </div>
                    <div class="box">
                      <div class="img-box">
                        <img src="{{ asset('images/shield-white.png')}}" alt="" class="img-1">
                        <img src="{{ asset('images/shield-black.png')}}" alt="" class="img-2">
                      </div>
                      <div class="detail-box">
                        <h5>
                          Safe and Secure
                        </h5>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        </p>
                      </div>
                    </div>
                    <div class="box">
                      <div class="img-box">
                        <img src="{{ asset('images/repairing-service-white.png')}}" alt="" class="img-1">
                        <img src="{{ asset('images/repairing-service-black.png')}}" alt="" class="img-2">
                      </div>
                      <div class="detail-box">
                        <h5>
                          24x7 support
                        </h5>
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
              <!-- end why section -->
            
              <!-- info section -->
            
              <section class="info_section layout_padding-top layout_padding2-bottom">
                <div class="container">
                  <div class="box">
                    <div class="info_form">
                      <h4>
                        Subscribe Our Newsletter
                      </h4>
                      <form action="">
                        <input type="text" placeholder="Enter your email">
                        <div class="d-flex justify-content-end">
                          <button>
            
                          </button>
                        </div>
                      </form>
                    </div>
                 
                    <div class="info_social">
                      <div>
                        <a href="">
                          <img src="{{ asset('images/fb.png')}}" alt="">
                        </a>
                      </div>
                      <div>
                        <a href="">
                          <img src="{{ asset('images/twitter.png')}}" alt="">
                        </a>
                      </div>
                      <div>
                        <a href="">
                          <img src="{{ asset('assets/images/linkedin.png')}}" alt="">
                        </a>
                      </div>
                      <div>
                        <a href="">
                          <img src="{{ asset('images/instagram.png')}}" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            
              </section>
            
              <!-- end info section -->
            
              <!-- footer section -->
              <section class="container-fluid footer_section">
                <div class="container">
                  <p>
                    &copy; 2024 YouCode
                  </p>
                </div>
              </section>
              <!-- footer section -->
           
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
        </script>
      
      
        <!-- owl carousel script -->
        <script type="text/javascript">
          $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            navText: [],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              768: {
                items: 2
              },
              1000: {
                items: 2
              }
            }
          });
        </script>
    </body>
</html>
