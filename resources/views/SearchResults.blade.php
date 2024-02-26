

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

            <div class="container">
                <h1 class="mt-5 mb-4">Search Results</h1>
            
                <div class="row row-cols-1 row-cols-md-2 text-center">
                    @foreach ($driverAndTaxiData as $result)
                        <div class="col mb-4">
                            <div class="">
                               
            
                                <div class="card bg-dark text-white position-relative" style="width:50%">
                                    <img style="width:50%"src="{{ asset('images/about-img.png')}}" alt="Background Image" class="center">
            
                                    <div class="overlay-text">
                                        <div class="details mb-3">
                                            <h5 class="card-title">{{ $result['route']->startCity->name }} to {{ $result['route']->endCity->name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Driver Details</h6>
                                            <p class="card-text">
                                                Driver Name: {{ $result['driver']->id}}<br>
                                                Description: {{ $result['driver']->Description}}<br>
                                                Payment: {{ $result['driver']->payment}}<br>
                                            </p>
                                        </div>
                                        <div class="details">
                                            <h6 class="card-subtitle mb-2 text-muted">Taxi Details</h6>
                                            <p class="card-text">
                                                Taxi Plate number: {{ $result['taxi']->Vehicle_Platenumber}}<br>
                                                Taxi Type: {{ $result['taxi']->Vehicle_Type}}<br>
                                              	


                                            </p>
                                        </div>
                                        @auth
                                        <div class="card-footer text-center">
                                            <button class="btn btn-warning">Reserve</button>
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
    
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
