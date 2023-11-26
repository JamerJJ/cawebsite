<?php
    include 'config/connect.php';
?>

<!DOCTYPE html>
<head>
    <title >JJ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-KPsfxNRkvJ+opX39AWyTDp2+Kp+bZeFqOtFZUe6+2lYunQMEo+Tx9PU66Q1iwZlF/FFcDp9/07iQ2GVKUCYyUg==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    
</head>

<body>
    
    <header>
        <div style="background: url('images/headerfull.png'); background-size: cover; background-position: center;" class="jumbotron bg-cover text-black">
            <div class="container py-5 text-center">
                <h1 class="display-4 font-weight-bold">Jubanski's The Raffle Website</h1>
                <p class="font-italic mb-0">Feeling lucky today?</p>
                <br>
                <a href="winners.php" role="button" class="btn btn-primary px-5">See All Winners</a>
            </div>
        </div>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="images/lucklogo.png">JJ
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="welcome.php" >Raffle Options</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="winners.php" >Winners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-left"></i></a>
            </li>
            </ul>
        </div>
    </nav>


    






