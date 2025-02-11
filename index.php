<?php
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['userID']))
{
    header("Location: login.php");
    die();
}

require("php/_connect.php");

$sql = "SELECT * FROM `users`";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/backend/js/app.js" defer></script>    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        .footer{
            background-color:#D51212;
            text-align: center;
            margin-top: auto;
            border-radius: 15px;
            padding: 1rem 0;
        }
        .footer p{
            margin: 0;
        }
        .container{
            text-align: center;
        }
        .navbar{
            background-color: #D51212;
            border-radius: 15px;
        }
        .container-fluid{
            text-align: center;
        }
        .container-fluid .title{
            background-color: #F17878;
            border-radius: 15px;
            padding: 15px 25px; 
        }
        .container-fluid .employee-testimony h4{
            display: inline-block; 
            background-color: #ffabc3;
            padding: 5px 15px;
            border-radius: 10px;
            text-align: center;
        }
        .container-fluid .card {
            background-color: #fff; 
            border-radius: 10px; 
            padding: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); 
            max-width: 300px;
            flex: 1; 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><h1>HateHire</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search For A Course..." aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit"><img src="/img/search-icon.png" alt="Search" height="25px" width="25px"></button>
                        </form>
                        <li class="nav-item">
                            <a class="nav-link" href="#course-content">Browse Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#course-history">Course History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#login-menu"><img src="/img/user.png" alt="profile icon" height="25px" width="25px"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main id="content">
        <div class="container-fluid">
            <h3 class="title">Welcome to <strong>HateHire</strong>, where the work is as unique as you are!</h3>
            <div class="employee-testimony">
                <h4>Employee Testimonies</h4>
            </div>
                <div class="card">
                    <p>“I felt like such a loser before i joined HateHire; but now I am so much more confident and full of hatred!!”</p>
                    <p>~ Janice, 29</p>
                </div>
                <div class="card">
                    <p>“I felt like such a loser before i joined HateHire; but now I am so much more confident and full of hatred!!”</p>
                    <p>~ Janice, 29</p>
                </div>
                <div class="card">
                    <p>“I felt like such a loser before i joined HateHire; but now I am so much more confident and full of hatred!!”</p>
                    <p>~ Janice, 29</p>
                </div>
            </div>
    </main>
    <footer>
        <div class="footer">
            <p>&copy; Copyright HateHire Ltd 2025</p>
        </div>
    </footer>

</body>
</html>


