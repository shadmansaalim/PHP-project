<?php require_once('includes/tools.php'); ?>
<?php
if (isset($_SESSION['username'])) {
    header("location: administration.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
</head>

<body class="">
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
                                window.location = "login.php";
                            });;
                        };
                    </script>
                <?php
                }
                ?>
                <h1 class="text-center login-title mb-5 fw-bold mt-2">Admin Credentials</h1>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Username...." required />
                    <label>Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password..." required />
                    <label>Password</label>
                </div>

                <div class="d-flex flex-column flex-lg-row align-items-center mt-5">
                    <button type="submit" name="login" value="Login" class="btn btn-success w-100 me-lg-1 mb-2 mb-lg-0">
                        Login <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                    <button formnovalidate type="submit" name="login" value="Login" class="btn btn-success w-100 ms-lg-1">
                        Login (Bypass Client) <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </div>
            </form>
        </section>
    </main>


    <!-- Footer -->
    <?php require_once('includes/footer.php'); ?>

    <!-- Scripts -->
    <?php require_once('includes/commonScripts.php'); ?>
</body>

</html>