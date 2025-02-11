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
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/img/trophy.jpg">
</head>

<body class="bg-light">
    <div class="container bg-light p-4 mt-4 text-center">
        <img src="/img/trophy.png" alt="trophy" height="100px" width="100px">
        <h1>Leaderboard</h1>
        <p>Winner of my heart <3</p>
        <hr>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User Options</th>
                <th scope="col">Favourite</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th scope="row">
                        <img class="rounded-circle" src="https://proficon.appserver.uk/api/identicon/<?= $row['userID'] ?>.svg" alt="Icon">
                    </th>
                    <td><?= htmlentities($row['firstName']) ?></td>
                    <td><?= htmlentities($row['lastName']) ?></td>
                    <td>
                        <a href="#" userID=<?= $row['userID'] ?> class="btn btn-danger btnDeleteUser">Delete User</a>
                        <a href="#" userID="<?= $row['userID'] ?>" class="btn btn-danger btnEditUser">Edit User</a>
                    </td>
                    <td>
                        <form action="php/favoriteUser.php" method="get">
                            <input type="hidden" name="firstName" value="firstName">
                             <a class="btn"><img src="/img/heart.png" alt="move to top" width="30px" height="30px"></a>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <hr>
    <div  class="text-center">
    <img src="/img/heart.png" alt="heart" height="100px" width="100px">
    <h2>Add a new love</h2>
    <p>Add a new user to the database</p>
    </div>

    <form method="POST" action="./php/createUser.php">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="mb-3">
            <label for="txtUserEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="txtUserEmail" name="txtUserEmail">
        </div>
        <div class="mb-3">
            <label for="txtUserPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="txtUserPassword" name="txtUserPassword">
        </div>
        <button type="submit" class="btn btn-danger btnCreateUser">Create New User</button>
    </form>

    <div class="modal" tabindex="-1" id="modalEditUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
 
                <form id="formEditUser">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="txtEditFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="txtEditFirstName">
                        </div>
 
                        <div class="mb-3">
                            <label for="txtEditLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="txtEditLastName">
                        </div>
                    </div>
 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    function loadUsers() {
        $.ajax({
            url: 'get_users.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const tableBody = $('#usersTable tbody');
                tableBody.empty(); // Clear any existing rows

                // Append new rows
                data.forEach(user => {
                    tableBody.append(`
                        <tr>
                            <td>${user.userID}</td>
                            <td>${user.firstName}</td>
                            <td>${user.lastName}</td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching users:', error);
            }
        });
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <script src="./scripts/adminDashScripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>