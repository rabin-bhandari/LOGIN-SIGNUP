<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="main.css" />
    <title>Welcome Screen</title>
  </head>
  <?php
  if ($_SESSION['admin'] === 0) {
    echo $_SESSION['admin'];
  ?>

    <body>
      <div class="container">
        <div class="card text-center">
          <div class="card-header">
            WELCOME ADMIN!
          </div>
          <div class="card-body">
            <h5 class="card-title">Hi <?php echo $_SESSION['first_name']; ?></h5>
            <table class="table table-hover">
              <thead CLASS=>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
            <p class="card-text">You've successfully logged in.</p>
            <a href="logout.php" class="btn btn-primary">Log Out</a>
          </div>
        </div>
      </div>
    </body>

  </html>
<?php
  } else {
?>

  <body>
    <div class="container">
      <div class="card text-center">
        <div class="card-header">
          WELCOME USER!
        </div>
        <div class="card-body">
          <h5 class="card-title">Hi <?php echo $_SESSION['first_name']; ?></h5>
          <p class="card-text">You've successfully logged in.</p>
          <a href="logout.php" class="btn btn-primary">Log Out</a>
        </div>
      </div>
    </div>
  </body>

  </html>
<?php

  }
} else {
  header("Location: index.php");
  exit();
}
?>