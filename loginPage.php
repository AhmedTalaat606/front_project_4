<html>

<head>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <form action="loginCode.php" method="post">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="content text-center shadow-lg p-5">
            <h1 class="pb-3">Login System</h1>

            <input type="email" name="email" class="form-control text-black mb-2 mt-2" placeholder="Enter your Email" />
            <input type="password" name="pasword" class="form-control text-black mb-2 mt-2" placeholder="Enter your Password" />
            <p class="text-danger" id="logmassage"></p>
            <p name="incorrect"></p>
            <button type="submit" name="login" class="button1 btn btn-outline-info w-100 mb-4 mt-4">
              Login
            </button>
            <p class="text-black">
              Don’t have an account?
              <a class="text-decoration-none " href="reg.php">
                <h6>Sign Up</h6>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>

</html>