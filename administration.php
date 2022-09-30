<?php require_once('includes/authorities.php'); ?>
<?php
if(!isset($_SESSION['username']))
{
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
                        <h4 class="m-0"><span class="text-uppercase">Drs123</span>'s
                            <span class="fw-bold">Dashboard</span>
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
                                        $file = fopen("data/appointments.txt","r");
                                        $bookings=0;
                                        while(!feof($file))
                                        {
                                            $row = fgetcsv($file);
                                            if(isset($row[0]))
                                            {
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
                                        $file = fopen("data/users.txt","r");
                                        $users=0;
                                        while(!feof($file))
                                        {
                                            $row = fgetcsv($file);
                                            if(isset($row[0]))
                                            {
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
                            <div class="p-3 bg-warning mb-3 fw-bold">
                                Patient Booking Requests
                            </div>
                            <table class="table table-secondary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Requested Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $file = fopen("data/appointments.txt","r");
                                $sno=0;
                                while(!feof($file))
                                {
                                    $sno++;
                                    $row = fgetcsv($file);
                                    if(isset($row[0]))
                                    {

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $sno ?></th>
                                            <td><?php echo $row[0] ?></td>
                                            <td><?php echo date_format(date_create($row[1]),"l, jS F Y") ?></td>
                                            <td><?php echo $row[2] ?></td>
                                            <td><?php echo date_format(date_create($row[4]),"l, jS F Y") ?></td>
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
                        if($msg != "")
                        {
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
                            <div class="p-3 bg-warning mb-3 fw-bold">
                                Users List
                            </div>
                            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Create User</button>
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
                                $file = fopen("data/users.txt","r");
                                $sno=0;
                                while(!feof($file))
                                {
                                    $sno++;
                                    $row = fgetcsv($file,0,":");
                                    if(isset($row[0]))
                                    {

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
                            <div class="p-3 bg-warning mb-3 fw-bold">
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
                                $file = fopen("data/accessattempts.txt","r");
                                $sno=0;
                                while(!feof($file))
                                {
                                    $sno++;
                                    $row = fgetcsv($file,0,":");
                                    if(isset($row[0]))
                                    {

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $sno ?></th>
                                            <td><?php echo $row[0] ?></td>
                                            <td><?php echo date_format(date_create($row[1]),"l, dS F Y h:i A") ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                fclose($file);
                                ?>
                                </tbody>
                            </table>
                        </div>






                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

                        <div class="w3-container">
                            <div id="id01" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                                <div class="w3-center"><br>
                                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                </div>

                                <form class="w3-container" action="" method="POST">
                                    <div class="w3-section">
                                    <label><b>Username</b></label>
                                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
                                    <label><b>Password</b></label>
                                    <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                                    <button name="create_user" class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Save</button>
                                    </div>
                                </form>

                                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                </div>

                                </div>
                            </div>
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