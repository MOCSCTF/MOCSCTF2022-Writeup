<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Very Security Shop - Contact</title>
  <link rel="stylesheet" href="/contact/style.css">
  <link rel="stylesheet" href="/style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/contact/script.js"></script>
</head>

<body>
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
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Shop</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/contact">Contact Us <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/.Navbar-->

  </header>

  <main>
    <div class="form-box">
      <h1>Contact Us</h1>
      <p>Write your message and attach screenshot here to let us know what you think!</p>
      <form action="/contact/submit.php" method="get">
        <div class="form-group">
          <label for="name">Your Name:</label>
          <input class="form-control" id="name" type="text" name="Name" required>
        </div>
        <div class="form-group">
          <label for="email">Your Email:</label>
          <input class="form-control" id="email" type="email" name="Email" required>
        </div>
        <div class="form-group">
          <label for="message">Comment and Feedback: </label>
          <textarea class="form-control" id="message" name="Message" required></textarea>
        </div>
        <div>
          <p>Attach a screenshot:</p>
          <div class="form-group">
            <div class="input-group">
              <div class="custom-file">
                <input name="uploadFile" id="uploadFile" type="file" class="custom-file-input" id="inputGroupFile02" onchange="checkFile(this)" accept=".jpg,.jpeg,.png">
                <label id="inputGroupFile01" class="custom-file-label" for="inputGroupFile02" aria-describeby="inputGroupFileAddon02">Select Image</label>
              </div>
              <button id="upload"><i class="fa fa-upload"></i></button>
            </div>
          </div>
          <p id="upload_message"></p>
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
      </form>
    </div>
  </main>
</body>

</html>