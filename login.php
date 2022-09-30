<?php require_once('includes/tools.php'); ?>
<?php
if(isset($_SESSION['username']))
{
    header("location: administration.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
</head>
<body class="booking-page">
    <main class="py-5">
        <section class="my-5">
            <form action="" method="post" id="booking-form" class="col-11 col-md-8 col-lg-6 shadow-lg p-3 p-md-5 rounded-3 mx-auto bg-white">
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
                                                window.location = "login.php";
                                            });;
                                    }; 
                            </script>
                    <?php
                }
                ?>
                <div class="text-center">
                    <img width="170px" height="170px" src="assets/logo.png" alt=""></img>
                </div>

                <h1 class="text-center login-title mb-5 fw-bold">Login Form</h1>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Username...." required />
                    <label>Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password..." required />
                    <label>Password</label>
                </div>

                <button type="submit" name="login" value="Login" class="btn btn-success w-100 mt-5">
                    Login
                </button>

            </form>
        </section>
    </main>
</body>

</html>