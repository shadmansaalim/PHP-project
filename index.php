<?php require_once('includes/tools.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php'); ?>
</head>

<body>
    <!-- Navbar -->
    <?php require_once('includes/navbar.php'); ?>
    <main>
        <section>
            <!-- Carousel -->
            <?php require_once('includes/carousel.php'); ?>
            <!-- Hero Section of the website introducing the website to users -->
            <?php require_once('includes/heroSection.php'); ?>
        </section>
        <section class="container mx-auto py-5">

            <!-- Plans Section -->
            <?php require_once('includes/plans.php'); ?>

            <!-- Staffs Section -->
            <?php require_once('includes/staffs.php'); ?>

            <!-- Contact Information Section -->
            <?php require_once('includes/contact.php'); ?>

            <!-- Company Core Values Section -->
            <?php require_once('includes/values.php'); ?>

        </section>
    </main>

    <!-- Footer -->
    <?php require_once('includes/footer.php'); ?>

    <!-- Scripts -->
    <?php require_once('includes/commonScripts.php'); ?>
</body>

</html>