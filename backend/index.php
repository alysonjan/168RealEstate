<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
     <!-- Favicons -->
    <link href="assets/img/logofav.png" rel="icon">
    <link href="assets/img/logo.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Administrator Login</title>
</head>

<body class="bg-dark">

    <div class="container">
   
        <div class="col-md-12">

        <div class="card card-login mx-auto mt-5">
            <h3 class="card-header text-center"><img src="assets/img/logofav.png" alt=""> Administrator</h3>
            <div class="card-body">
                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h5 class=" text-danger"> ' . $_SESSION['status'] . ' </h5>';
                    unset($_SESSION['status']);
                }
                ?>
                <form method="POST" action="process.php">
                    <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" id="exampleInputEmail1" name="email" required type="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" id="exampleInputPassword1" name="pass" required type="password" placeholder="Password">
                    </div>

                    <div class="row justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Login" name="login-btn" />
                    </br>
                    </div>
                </form>

            </div>
            
        </div>
        </div>
    </div>
    

</body>

</html>