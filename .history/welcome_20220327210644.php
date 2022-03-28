<?php

session_start();
include "connection.php";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="main.css" />
    <title>Welcome</title>
  </head>
  <?php
  if ($_SESSION['admin'] == 1) {
  ?>

    <body>

      <div class="admin-container">
        <div class="card text-center">
          <div class="card-header">
            WELCOME ADMIN!
          </div>
          <div class="card-body">
            <h5 class="card-title">Hi <?php echo $_SESSION['first_name']; ?></h5>
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col"></th>
                  <th scope="col">HELLO</th>


                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                while ($row_user = mysqli_fetch_array($result)) {
                  $id = $row_user['id'];
                  $first_name = $row_user['first_name'];
                  $last_name = $row_user['last_name'];
                  $email = $row_user['email'];
                  $admin = ($row_user['admin'] == 1) ? 'admin' : 'user';

                ?>
                  <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $first_name; ?></td>
                    <td><?php echo $last_name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $admin; ?></td>
                    <td><button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-pencil"></button></td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>


                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <a href="logout.php" class="btn btn-primary">Log Out</a>
          </div>
        </div>
      </div>

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
      <?php
    }
      ?>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      </body>

  </html>

<?php
} else {
  header("Location: index.php");
  exit();
}

?>