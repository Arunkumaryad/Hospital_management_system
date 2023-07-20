<?php
session_start();
include('../HMS/includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apply Now!!!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <!-- Popper JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/75e668eaf0.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
   <link rel="googleapis" href="https://www.google.com">
   <link rel="youtube" href="https://www.youtube.com/watchtv">
</head>

<body style="background-image: url(./image/hospital.jpg); background-size:cover; background-repeat: no-repeat;">

    <div class="container_fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now!!!</h5>
                    <form action="applyprocessor.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="firstname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value=" <?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="lastname" class="form-control" autocomplete="off" placeholder="Enter Surname" value=" <?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username" value=" <?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value=" <?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="contact" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value=" <?php if(isset($_POST['contact'])) echo $_POST['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="Russia">Russia</option>
                                <option value="America">America</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Upload Photo</label>
                            <input type="file" class="form-control" id="files[]" name="files[]" multiple required />
                        </div>
                        <div class="small font-italic text-muted mb-4"><span style="color:#d41459;">JPG or PNG not larger than 1 MB (Single Photo)</span></div>
                        <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                        <p>I already have an account <a href="login.php">Click here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>