<?php require_once('includes/authorities.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
    <link rel="stylesheet" href="styles/admin.css">
</head>

<body>
    <!-- Navbar -->

    <main>
        <div class="d-flex toggled" id="wrapper">

            <div id="sidebar-wrapper" style="background-color: black;">
                <div class="text-center pt-4 pb-2 border-bottom">

                    <img width="70px" height="70px" class=" img-fluid rounded-circle settings-user-img mb-3" src="assets/profile.png" alt=""></img>

                </div>
                <div class="list-group list-group-flush my-3 mx-auto">
                    <div>
                        <a href="index.php" class="text-decoration-none">
                            <button class="btn btn-success col-10 mb-3 d-flex justify-content-between align-items-center mx-auto">
                                <span class="col-3 text-end">
                                    <i class="fa-solid fa-house"></i>
                                </span>
                                <span class="col-8 text-start">Home</span>
                            </button>
                        </a>

                        <a href="logout.php" class="btn btn-outline-warning col-10 d-flex justify-content-between
                            align-items-center mx-auto">
                            <span class="col-3 text-end">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </span>
                            <span class="col-8 text-start">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle" style="color: #006B5A;"></i>
                        <h4 class="m-0">
                            <span class="fw-bold">Admin Dashboard</span>
                        </h4>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div>
                        <div class="row g-3 my-2 text-white">
                            <div class="col-lg-6 col-xl-3">
                                <div class="p-4 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #3984ff; ">
                                    <div class="col-8">
                                        <?php
                                        $file = fopen("data/appointments.txt", "r");
                                        $bookings = 0;
                                        while (!feof($file)) {
                                            $row = fgetcsv($file);
                                            if (isset($row[0])) {
                                                $bookings++;
                                            }
                                        }
                                        fclose($file);
                                        ?>
                                        <h3 class="fw-bold fs-2 m-0"><?php echo $bookings ?></h3>
                                        <p class="m-0">Booking Requests</p>
                                    </div>
                                    <span class="col-4 text-start">
                                        <i class="fa-solid fa-bars-progress fs-2 primary-text border rounded-full secondary-bg p-3 m-0"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-3">
                                <div class="p-4 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color:  #fa5649;">
                                    <div class="col-8">
                                        <h3 class="fw-bold fs-2 m-0">3</h3>
                                        <p class="m-0">Doctors</p>
                                    </div>
                                    <span class="col-4 text-start">
                                        <i class="fa-solid fa-user-doctor fs-2 primary-text border rounded-full secondary-bg p-3 m-0"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3">
                                <div class="p-4  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #ffa113">
                                    <div class="col-8">
                                        <?php
                                        $file = fopen("data/users.txt", "r");
                                        $users = 0;
                                        while (!feof($file)) {
                                            $row = fgetcsv($file);
                                            if (isset($row[0])) {
                                                $users++;
                                            }
                                        }
                                        fclose($file);
                                        ?>
                                        <h3 class="fw-bold fs-2 m-0"><?php echo $users ?></h3>
                                        <p class="m-0">Admins</p>
                                    </div>
                                    <span class="col-4 text-start">
                                        <i class="fas fa-users fs-2 primary-text border rounded-full secondary-bg p-3 m-0"></i>
                                    </span>

                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-3">
                                <div class="p-4  shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #5a00dd">
                                    <div class="col-8">
                                        <h3 class="fw-bold fs-2 m-0">0</h3>
                                        <p class="m-0">Reviews</p>
                                    </div>
                                    <span class="col-4 text-start">
                                        <i class="fas fa-pen fs-2 primary-text border rounded-full secondary-bg p-3 m-0"></i>
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="my-5">
                            <div class="p-3 bg-info mb-3 fw-bold rounded-3">
                                Patient Booking Requests
                            </div>
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient ID</th>
                                        <th scope="col">Requested Date</th>
                                        <th scope="col">Preferred Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $file = fopen("data/appointments.txt", "r");
                                    $sno = 0;
                                    while (!feof($file)) {
                                        $sno++;
                                        $row = fgetcsv($file);
                                        if (isset($row[0])) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $sno ?></th>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo date_format(date_create($row[1]), "l, jS F Y") ?></td>
                                                <td><?php echo $row[2] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    fclose($file);
                                    ?>
                                </tbody>
                            </table>
                        </div>


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
                                        window.location = "administration.php";
                                    });;
                                };
                            </script>
                        <?php
                        }
                        ?>
                        <div class="my-5">
                            <div class="p-3 bg-info rounded-3 mb-3 d-flex justify-content-between align-items-center">
                                <p class="fw-bold m-0">Users List</p>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-dark">Create User <i class="fa-solid fa-users"></i></button>
                            </div>
                            <!-- User Creating Modal Form -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create New Admin User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="container mx-auto" action="" method="POST">
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" required />
                                                    <label htmlFor="username">Username</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required />
                                                    <label htmlFor="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button name="create_user" type="submit" class="btn btn-success w-100 mb-2">Submit</button>
                                                <button formnovalidate name="create_user" type="submit" class="btn btn-success w-100">Submit (Bypass Client)</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $file = fopen("data/users.txt", "r");
                                    $sno = 0;
                                    while (!feof($file)) {
                                        $sno++;
                                        $row = fgetcsv($file, 0, ":");
                                        if (isset($row[0])) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $sno ?></th>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    fclose($file);
                                    ?>
                                </tbody>
                            </table>
                        </div>



                        <div class="my-5">
                            <div class="p-3 bg-info rounded-3 mb-3 fw-bold">
                                Unsuccessful Login Attempts
                            </div>
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $file = fopen("data/accessattempts.txt", "r");
                                    $sno = 0;
                                    while (!feof($file)) {
                                        $sno++;
                                        $row = fgetcsv($file, 0, ":");
                                        if (isset($row[0])) {

                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $sno ?></th>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo date_format(date_create($row[1]), "l, dS F Y h:i A") ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    fclose($file);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Scripts -->
    <?php require_once('includes/commonScripts.php'); ?>
    <script src="js/administration.js"></script>
</body>

</html>