<html>

<head>
  <title>Daniels</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="home">
    <div class="contentHome">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand text-white text-center fs-3" href="#">DANIELS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse align-content-center justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active p-3" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-3" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link p-3" href="#end">Contact</a>
              </li>

              <li class="nav-item">
                <a class="nav-link p-3" href="############"><i class="fa-solid fa-user"></i></a>
              </li>

              <li class="nav-item">
                <a class="nav-link p-1" href="loginPage.php"><button class="btn btn-dark">LogIn</button></a>
              </li>

              <li class="nav-item">
                <a class="nav-link p-1" href="logout.php"><button class="btn btn-dark">LogOut</button></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="home1" id="home">
        <div class="hometext p-2">
          <h5 class="fw-bold fa-4x">Hello</h5>
          <h2 class="fst-normal py-3">I Am</h2>
          <div class="icon0 p-3">
            <i class="fa-brands px-2 rounded-circle bg-black text-white fa-facebook-f"></i>
            <i class="fa-brands px-2 rounded-circle bg-black text-white fa-twitter"></i>
            <i class="fa-brands px-2 rounded-circle bg-black text-white fa-linkedin"></i>
            <i class="fa-brands px-2 rounded-circle bg-black text-white fa-behance"></i>
            <i class="fa-brands px-2 rounded-circle bg-black text-white fa-youtube"></i>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>

  <section id="adout">
    <div class="container my-5" id="about">
      <div class="row container m-4">
        <div class="col-lg-4 col-sm-12">
          <div class="img">
            <img class="w-100" src="img/R.jpg" alt="" />
          </div>
        </div>

        <div class="col-lg-8 col-sm-12">
          <h2 class="text-headerabout">About Us</h2>
          <h6 class="text-ui"></h6>
          <p class="text-ui py-3">
            We are <span class="fw-bolder">TOp4</span> Welcome to Laptop Haven!
            we are dedicated to providing you with the best selection of laptops to cater to all
            your computing needs. Whether you're a student, a professional, a gamer, or simply
            seeking a reliable device for everyday use, we have the perfect laptop for you.

          <h4>Our Commitment:</h4>
          <p class="text-ui py-3">
            At Laptop Haven, we are passionate about technology and committed
            to delivering top-notch products and exceptional customer service.
            We understand that choosing the right laptop can be overwhelming,
            given the vast array of options available in the market. That's why
            we strive to make your laptop buying experience easy, enjoyable, and rewarding. </p>
          <h4>Wide Range of Laptops:</h4>
          <p class="text-ui py-3">
            We take pride in offering an extensive range of
            laptops from all the leading brands, including but not limited
            to Apple, Dell, HP, Lenovo, Asus, Acer, and more. Whether you prefer
            Windows or macOS, lightweight ultrabooks or powerful gaming machines,
            we have something that suits your preferences and budget.
          </p>


        </div>
      </div>
    </div>
  </section>

  <?php
  $servername = "127.0.0.1:3325";
  $username = "root";
  $password = "";
  $dbname = "labmarket";


  // Create connection
  $conn = mysqli_connect($servername, $username, $passworddb, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn, $sql);
  #print_r($result);

  if ($result) {
    // Fetch data
    $productid = array("");
    $productname = array("");
    $productdata = array("");
    $productdescrpt = array("");

    while ($row = mysqli_fetch_assoc($result)) {
      // Process and display data
      $productid[] = $row["pid"];
      $productname[] = $row["productName"];
      $productdata[] = $row["dateEnter"];
      $productdescrpt[] = $row["descrp"];
    }

    // Free result set
    mysqli_free_result($result);
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  #print_r($productdescrpt[2]);
  // Close connection
  mysqli_close($conn);


  ?>

  <div id="item">
    <div class="container mt-5">
      <div class="row g-5">
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <img src="img/lap1.webp" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php print_r($productid[2])?></li>
              <li class="list-group-item"><?php print_r($productdescrpt[2])?></li>
              <li class="list-group-item"><?php print_r($productdata[2])?></li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="card" style="width: 18rem">
            <img src="img/lap1.webp" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php print_r($productid[1])?></li>
              <li class="list-group-item"><?php print_r($productdescrpt[1])?></li>
              <li class="list-group-item"><?php print_r($productdata[1])?></li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="card" style="width: 18rem">
            <img src="img/lap1.webp" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php print_r($productid[3])?></li>
              <li class="list-group-item"><?php print_r($productdescrpt[3])?></li>
              <li class="list-group-item"><?php print_r($productdata[3])?></li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="card" style="width: 18rem">
            <img src="img/lap1.webp" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
              <li class="list-group-item">A third item</li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5" id="end">
    <h2 class="fw-bold text-center py-4">Our Blog.</h2>

    <div class="row w-75 m-auto">
      <div class="col-lg-4 col-sm-12 text-center itme2">
        <i class="fa-solid fa-location-arrow fa-2x p-2 text-black rounded-circle icon2"></i>
        <h4>address</h4>
        <p class="lead">11111111111111111111</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center itme2">
        <i class="fa-solid fa-envelope fa-2x p-2 text-black rounded-circle icon2"></i>
        <h4>Eamil</h4>
        <p class="lead">2222222222222222222</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center itme2">
        <i class="fa-solid fa-phone fa-2x p-2 text-black rounded-circle icon2"></i>
        <h4>Phone</h4>
        <p class="lead">3333333333333333333</p>
      </div>
    </div>

    <div class="container">
      <form>
        <div class="m-auto text-center mt-4">
          <div class="d-inline-flex">
            <input type="text" class="lead bgcontact form-control mx-2" placeholder="name" name="name" />

            <input type="text" class="lead bgcontact form-control mx-2" placeholder="Email" name="email" />
          </div>
          <div class="m-auto w-50">
            <textarea placeholder="Massage" class="lead bgcontact form-control mt-4" cols="10" rows="7 "></textarea>
          </div>
        </div>
        <div class="m-auto text-center mt-2">
          <button class="btn bg-black text-white text-center">submit</button>
        </div>
      </form>
    </div>
  </div>

  <div class="end m-auto text-center">
    <p class="mt-4 pt-3">Copy Right 2018 © By Daniels All Rights Reserved</p>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>