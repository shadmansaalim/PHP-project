<?php require_once('includes/tools.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
    <link rel="stylesheet" href="styles/booking.css">
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="sweetalert2.min.js"></script> -->
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>


<body class="booking-page">
    <!-- Navbar -->
    <?php require_once('includes/navbar.php'); ?>
    <main class="py-5">
        <section class="my-5">
            <form action="" method="post" id="booking-form" class="col-11 col-md-8 col-lg-6 shadow-lg p-3 p-md-5 rounded-3 mx-auto bg-white">
                <?php
                if ($msg != "") {
                ?>
                    <script>
                        window.onload = (event) => {
                            swal(
                                "<?php echo ($color == "green") ? "Success" : "Error" ?>!",
                                "<?php echo $msg ?>",
                                "<?php echo ($color == "green") ? "success" : "error" ?>"
                            ).then(function() {
                                window.location = "booking.php";
                            });;
                        };
                    </script>
                <?php
                }
                ?>
                <h1 class="text-start login-title mb-5 fw-bold">Book Appointment</h1>
                <div class="form-floating mb-3">
                    <input name="pid" type="text" class="form-control text-uppercase" id="pid" placeholder="Patient ID" required />
                    <label htmlFor="pid">Patient ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="date" type="date" class="form-control" id="date" placeholder="Appointment Date" required />
                    <label htmlFor="date">Appointment Date</label>
                </div>
                <div>
                    <p>Select the times you are available</p>
                    <div class="btn-group mb-3 w-100" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" name="time[]" id="time1" autocomplete="off" value="9am - 12pm">
                        <label class="btn btn-info text-warning" for="time1">9am - 12pm</label>

                        <input type="checkbox" class="btn-check" name="time[]" id="time2" autocomplete="off" value="12pm - 3pm">
                        <label class="btn btn-info text-warning" for="time2">12pm - 3pm</label>

                        <input type="checkbox" class="btn-check" name="time[]" id="time3" autocomplete="off" value="3pm - 6pm">
                        <label class="btn btn-info text-warning" for="time3">3pm - 6pm</label>
                    </div>
                </div>
                <div>
                    <select name="booking_reason" id="booking-select" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        <option value="">Select your appointment reason</option>
                        <option value="1">Childhood Vaccination Shots </option>
                        <option value="2">Influenza Shot</option>
                        <option value="3">Covid Booster Shot</option>
                        <option value="4">Blood Test</option>
                    </select>
                    <section id="advice">

                    </section>
                </div>

                <div class="d-flex flex-column flex-lg-row align-items-center mt-5">
                    <button type="submit" name="book" value="book" class="btn btn-success w-100 me-lg-2 mb-2 mb-lg-0">
                        Book Appointment <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                    <button formnovalidate type="submit" name="book" value="book" class="btn btn-success w-100 ms-lg-1">
                        Book Appointment (Bypass Client) <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('includes/footer.php'); ?>

    <!-- Scripts -->
    <?php require_once('includes/commonScripts.php'); ?>
    <script src="js/booking.js"></script>
</body>

</html>