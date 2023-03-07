<!-- $sql = "INSERT INTO admins (login, password, level) VALUES ('$login', '$password', 'superadmin')"; -->

<?php 
require_once("./db/database.php");
  if (!empty($_POST)) {
    login();
  }
?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

  <title>Italian Restaurant</title>
  <link rel="icon" href="images/logo.png">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php
  if (empty($_COOKIE['admin'])) { ?>
    <div class='login'>
        <form action='./index.php' class="card p-2 bg-dark text-light" method='post'>
          <h2 class="mb-2">Login</h2>
          <input class='form-control' type="text" name='login' placeholder="login" />
          <input class='form-control my-2' type="password" name='password' placeholder="password" />
          <button class='btn btn-primary'>login</button>
        </form>
    </div>
  <?php } else { ?>
      <div id="Welcome">
      <!---Start navigation Bar -->
      <nav class="navbar navbar-expand-lg navbar fixed-top  navbar-light bg-light">
        <a class="navbar-brand" href="/">
          <img src="../images/logo.png" width="50" height="50" class="d-inline-block" alt=""> <?= user()['login'] ?>: <?= user()['role'] ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item">
              <p class="my-2"></p>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#OurLocation">Add new admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin/logout.php" onclick="return confirm('are you logout')">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    
      <!--- End Navigation Bar -->
      <div style="margin: 10vh auto; width: 90vw;">
      <h2>Today's orders</h2>  
        <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">date</th>
            <th scope="col">time</th>
            <th scope="col">guests</th>
            <th scope="col">additional</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach(timeDimensions(date("Y-m-d")) as $arr): ?>
            <?php ?>
            <tr>
              <?php foreach($arr as $key => $value): ?>
                <th><?= $value ?></th>
              <?php endforeach; ?>
              <th>
                <a class='btn btn-danger m-0' href="./delete.php?id=<?= $arr['id'] ?>">Delete</a>
              </th>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
        <PRE>
          <?php
            // print_r($allOders);
            // echo $allOders[2]["date"]  . "=" . date('y-m-d');
            // echo "<br>";
            // if (date('Y-m-d') == $allOders[2]["date"]) {
            //   echo "true";
            // } else {
            //   echo "false";
            // }
          ?>
        </PRE>
        <h2>All pre-orders</h2>  
        <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">date</th>
            <th scope="col">time</th>
            <th scope="col">guests</th>
            <th scope="col">additional</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach(allPreOrders() as $arr): ?>
            <?php ?>
            <tr class="table-<?= $arr['date'] == date('Y-m-d') ? "danger" : "" ?>">
              <?php foreach($arr as $key => $value): ?>
                <th><?= $value ?></th>
              <?php endforeach; ?>
              <th>
                <a class='btn btn-danger m-0' href="./delete.php?id=<?= $arr['id'] ?>">Delete</a>
              </th>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
      

   
      <div class="d-flex footer">
        <div class="col">
          <p class="text-center d-flex justify-content-center align-items-center">Follow us:<a class="social-icon"
              href="#"><i class="fab fa-instagram"></i></a></p>
        </div>
        <div class="col">
          <p class="text-center">Copyright &copy; <i class="newYear"></i></p>
          <script>
            let year = new Date().getFullYear();
            let newYear = document.querySelector(".newYear");
            newYear.innerHTML = year;
          </script>
        </div>
        <div class="col">
          <p class="text-center">Powered by: <a href="#">Temur Komilov</a></p>
        </div>
      </div>
    </div>
    <footer class="container">
      <div class="row only-mobile mb-2">
        <div class="col-6">
          <a class="btn btn-primary btn-block text-center" href="tel:+998 93 241 72 21"><i class="fa fa-phone"
              aria-hidden="true"></i> Call</a>
        </div>
        <div class="col-6">
          <a class="btn btn-danger btn-block text-center" target="_blank" href="https://www.instagram.com/01_100_tim/"><i
              class="fab fa-instagram" aria-hidden="true"></i> Instagram</a>
        </div>
      </div>
    </footer>
  <?php } ?>
  
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script type="text/javascript" src="../js/smooth-scroll.js"></script>
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  <script type="text/javascript" src="../js/image-effect.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>