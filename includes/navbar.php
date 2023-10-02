<nav class="navbar navbar-expand-lg">
    <div class="container p-2">
        <!-- Website Logo -->
        <a class="navbar-brand fw-bold" href="index.php">
            RusselStreetMedical
            <i class="fa-solid fa-house-medical"></i>
        </a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-info" text-white aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php#plans-container">Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php#staff-container">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php#values">Values</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="administration.php">Admin</a>
                </li>
            </ul>


            <?php
            if (!isset($_SESSION['username'])) {
            ?>
                <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                    <a href="tel:03 9925 2000" class="me-0 me-lg-2 mb-2 mb-lg-0">
                        <button class="btn btn-lg btn-outline-info w-100">
                            <span class="ms-2">03 9925 2000</span>
                            <i class="fa-solid fa-phone"></i>
                        </button>
                    </a>
                    <a href="booking.php">
                        <button class="btn btn-lg btn-warning">Book Now<span class="ms-2"><i class="fa-solid fa-right-to-bracket"></i></span>
                        </button>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <img src="assets/profile.png" class="img-fluid" width="40px" height="40px" alt="Profile">
            <?php
            }
            ?>
        </div>
    </div>
</nav>