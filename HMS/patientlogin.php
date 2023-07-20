<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patirnt Login Page</title>
</head>
<body style="background-image: url(./image/hospital.jpg); background-size:cover; background-repeat: no-repeat;">
    <?php 
       include('../HMS/includes/header.php'); 


     ?>
     <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                        <p>I don't have an account <a href="#">Click here</a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
     </div>
</body>
</html>