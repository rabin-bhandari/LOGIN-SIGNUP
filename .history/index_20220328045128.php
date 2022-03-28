<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    header("Location: welcome.php");
}

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
    <title>LOGIN-SIGNUP (JQuery)</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Login</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-signup" type="button" role="tab" aria-controls="nav-signup" aria-selected="false">Signup</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                <form id="login-form" method="post" action="login.php" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-1" type="submit">Log in</button>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                <form id="signup-form" action="signup.php" method="post" class="needs-validation" novalidate>
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
                    <button id="btn2" class="btn btn-primary mt-1" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="validation.js"></script>

</body>

</html>