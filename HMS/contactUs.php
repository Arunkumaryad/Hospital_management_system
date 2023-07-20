<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US Page</title>
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
    <link rel="stylesheet" href="../HMS/css/style.css">
    <link rel="stylesheet" href="../HMS/css/contactus.css">
</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <a href="#" class="logo"><i class="fas fa-heartbeat"></i> Medicare.</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contactUS.php">Contact</a>
            <a href="service.php">Services</a>
        </nav>
        <div class="buttons">
            <button class="btn btn-primary">
                <a href="apply.php">SignUp</a>
            </button>
            <button class="btn btn-primary">
                <a href="login.php">Login</a>
            </button>
        </div>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- header section ends -->
    <div class="contactUs">
        <div class="title">
            <h2>Get in Touch</h2>
        </div>
        <div class="box">
            <!-- Form -->
            <div class="contact form">
                <h3>Send a message</h3>
                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input type="text" placeholder="Arun">
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input type="text" placeholder="Kumar">
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" placeholder="arunkumaryadav6207@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" placeholder="+91 6207687614">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea placeholder="write your message here...."></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- info-box -->
            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <p>Chhattarpur Palamu, Jharkhand <br>INDIA</p>
                    </div>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="mailto:arunkumaryadav6207@gmail.com">arunkumaryadav6207@gmail.com</a>
                    </div>
                    <div>
                        <span><ion-icon name="call"></ion-icon></span>
                        <a href="tel:+91 6207687614">+91 6207687614</a>
                    </div>
                    <!-- Social media links -->
                    <ul class="sci">
                        <li><a href="https://www.facebook.com/sumankumar.yadav.71066"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="https://www.twitter.com/ArunKum92814357"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a href="https://www.linkedin.com/in/arun-kumar-yadav-131173236"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                        <li><a href="https://www.instagram.com/spidey__arun/"><ion-icon name="logo-instagram"></ion-icon></a></li>

                    </ul>
                </div>
            </div>
            <!-- Map -->
            <div class="contact map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14537.089392010106!2d84.17886074043876!3d24.37182739767349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398c6734819ee231%3A0x3165aa533db8df33!2sChhatarpur%2C%20Jharkhand%20822113!5e0!3m2!1sen!2sin!4v1686490493799!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <?php include('../HMS/includes/footer.php') ?>

</body>

</html>