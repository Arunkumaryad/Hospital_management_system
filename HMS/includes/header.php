
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <h5 class="navbar-brand text-white">MediCare</h5>
        <ul class="navbar-nav ms-auto">
            <?php
            if (isset($_SESSION['AdminUsername'])) {
               $Admin = $_SESSION['AdminUsername'];
                echo '
                    <li class="nav-item"><a href="#" class="nav-link text-white">' .$Admin . '</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
            } elseif (isset($_SESSION['DoctorUsername'])) {
                $Doctor = $_SESSION['DoctorUsername'];
                echo '
                    <li class="nav-item"><a href="#" class="nav-link text-white">' . $Doctor . '</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
            } elseif (isset($_SESSION['PatientUsername'])) {
               $Patient = $_SESSION['PatientUsername'];
                echo '
                    <li class="nav-item"><a href="#" class="nav-link text-white">' .$Patient . '</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
            } else {
                echo '
                    <li class="nav-item"><a href="login.php" class="nav-link text-white">Doctor Login</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link text-white">Patient Login</a></li>';
            }
            ?>

        </ul>
    </nav>
