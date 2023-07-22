<?php include('config/constant.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kopitime - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/904fa8d934.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Nav section Starts  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span>Kopi</span> time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="<?php echo $url; ?>">Home</a>
                    <a class="nav-link" href="<?php echo $url; ?>admin/manage_admin.php">Admin</a>
                    <a class="nav-link" href="<?php echo $url; ?>categories.php">Category</a>
                    <a class="nav-link" href="<?php echo $url; ?>coffee.php">Coffee</a>
                    <a class="nav-link" href="<?php echo $url; ?>contact.php">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Nav Section ends  -->