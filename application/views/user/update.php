<?php
$base = __DIR__;
include $base .'\..\layout\menu.php';
//debug_print_backtrace();
?>

<?php
$cod = $_SESSION['user_id'];
$name = $data["user"]->getName();
$email = $data["user"]->getEmail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card h-25" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Update your account</h2>

              <form action="/user/submitUpdate" method="POST">

                <div class="form-outline mb-4">
                  <input type="text" value="<?= $name ?>" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" value="<?= $email ?>" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="old_password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg" >Old Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg" >New Password</label>
                </div>

                <input type="hidden" name="cod" value="<?= $cod ?>">
                <div class="d-flex justify-content-center">
                  <input type="submit"  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Update">
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>