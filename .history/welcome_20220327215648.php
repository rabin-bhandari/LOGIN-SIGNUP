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
                    <td>
                      <!-- Button trigger modal -->
                      <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalCenter<?php echo $id; ?>"><i class="fa fa-pencil"></i></button>

                      <!-- Modal -->
                      <div class="modal fade" id="ModalCenter<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalCenterTitle">Edit User</b></h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="needs validation pt-0 pb-0">
                                <div class="row g-3 mb-3">
                                  <div class="col-md-6">
                                    <label for="first-name" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="first-name" name="fname" placeholder="First name" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="last-name" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="last-name" name="lname" placeholder="Last name" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="mb-3">
                                    <label for="validation1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="validation1" name="validation1" placeholder="Enter Password" required />
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="mb-3">
                                    <label for="validation2" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="validation2" name="validation2" oninput="validate_pw2(this)" placeholder="Re-Enter Password" required />
                                    <div class="invalid-feedback">
                                      Password's do not match!
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <label for="validationServer04" class="form-label">Role</label>
                                  <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                  </select>
                                  <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
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