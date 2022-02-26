<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Very Security Shop</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <header>

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
        <a class="navbar-brand" href="/">
          <strong>Very Security Shop</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/.Navbar-->

  </header>

  <main>

    <!--Main layout-->
    <div class="container">
      <div class="row">

        <!--Sidebar-->
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

          <div class="widget-wrapper">
            <h4>List of Products:</h4>
            <br>
            <div class="list-group">
              <a href="#" class="list-group-item active">Computer</a>
              <a href="#" class="list-group-item">Software</a>
              <a href="#" class="list-group-item">Security Course</a>
              <a href="#" class="list-group-item">CTF</a>
              <a href="#" class="list-group-item">Macau Gift</a>
            </div>
          </div>

        </div>
        <!--/.Sidebar-->

        <!--Main column-->
        <div class="col-lg-8">

          <!--First row-->
          <div class="row wow fadeIn" data-wow-delay="0.4s">
            <div class="col-lg-12">
              <div class="divider-new">
                <h2 class="h2-responsive">Editor's Recommendation</h2>
              </div>


              <!--Carousel Wrapper-->
              <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                  <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <!--First slide-->
                  <div class="carousel-item active">
                    <img src="slide-photo1.jpeg" alt="First slide">
                    <div class="carousel-caption">
                      <h4>New Models</h4>
                      <br>
                    </div>
                  </div>
                  <!--/First slide-->
                  <!--Second slide-->
                  <div class="carousel-item">
                    <img src="slide-photo2.jpeg" alt="Second slide">
                    <div class="carousel-caption">
                      <h4>Buy 1 get 1 free</h4>
                      <br>
                    </div>
                  </div>
                  <!--/Second slide-->
                  <!--Third slide-->
                  <div class="carousel-item">
                    <img src="slide-photo3.jpeg" alt="Third slide">
                    <div class="carousel-caption">
                      <h4>Please join us!</h4>
                      <br>
                    </div>
                  </div>
                  <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
              </div>
              <!--/.Carousel Wrapper-->
            </div>
          </div>
          <!--/.First row-->
          <br>
          <hr class="extra-margins">

          <!--Second row-->
          <div class="row">
            <!--First columnn-->
            <div class="col-lg-4">
              <!--Card-->
              <div class="card  wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                  <img src="/computer.jpeg" class="img-fluid" alt="">
                  <a href="#">
                    <div class="mask"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                  <!--Title-->
                  <h4 class="card-title">Computer</h4>
                  <!--Text-->
                  <p class="card-text">Buy a new PC to play CTF!</p>
                  <a href="#" class="btn btn-default">Start from <strong>$0</strong></a>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->
            </div>
            <!--First columnn-->

            <!--Second columnn-->
            <div class="col-lg-4">
              <!--Card-->
              <div class="card  wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                  <img src="/software.jpeg" class="img-fluid" alt="">
                  <a href="#">
                    <div class="mask"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                  <!--Title-->
                  <h4 class="card-title">Software</h4>
                  <!--Text-->
                  <p class="card-text">Buy 1 get 1 free promotion!</p>
                  <a href="#" class="btn btn-default">Start from <strong>$0</strong></a>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->
            </div>
            <!--Second columnn-->

            <!--Third columnn-->
            <div class="col-lg-4">
              <!--Card-->
              <div class="card  wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                  <img src="/CTF.jpeg" class="img-fluid" alt="">
                  <a href="#">
                    <div class="mask"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                  <!--Title-->
                  <h4 class="card-title">CTF</h4>
                  <!--Text-->
                  <p class="card-text">Let's play CTF together for fun!</p>
                  <a href="#" class="btn btn-default"><strong>Free</strong> Register</a>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->
            </div>
            <!--Third columnn-->
          </div>
          <!--/.Second row-->

        </div>
        <!--/.Main column-->

      </div>
    </div>
    <!--/.Main layout-->

  </main>

  <!-- partial -->
  <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>?