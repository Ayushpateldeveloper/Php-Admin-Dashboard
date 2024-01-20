<!-- The code you provided is an HTML document that contains a login form. It uses the Bootstrap framework to style the form and make it responsive. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Login 13 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="images/logo.jpg" alt="BootstrapBrain Logo" width="175" height="100">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
            <form action="login_db.php" method="post" id="loginForm">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="empid" id="empid" required>
                    <label for="empid" class="form-label">Emp Id</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex gap-2 justify-content-between">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                      <label class="form-check-label text-secondary" for="rememberMe">
                        Keep me logged in
                      </label>
                    </div>
                    <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit" name="save" form="loginForm">Log in</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Don't have an account? <a href="#!" class="link-primary text-decoration-none">Sign up</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>