<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-danger d-flex justify-content-center align-items-center vh-100">
    <main class="p-4 bg-white rounded">
    <h2 class="text-center mb-4">Login Page</h2>
        <form action="php/auth.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <script>
 
	        // Detect the submission of the login form.
            $('#formLogin').submit(function(e) {
            // Prevent a reload of the page
            e.preventDefault();
 
            // Make AJAX call to auth.php
            $.ajax({
                // URL is where we are sending it
                url: 'auth.php',
 
                // Method is how we are sending it
                method: 'POST',
 
                // Data is the data we are sending
                data: $(this).serialize(),
 
                success: function(response) {
                    // "true" means that the user was authenticated from auth.php
                    if (response == 'true')
                    {
                        // Redirect to index.php
                        window.location.href = 'index.php';
                    }
                    else
                    {
                        Swal.fire({
                            title: "Something went wrong!",
                            text: response,
                            icon: "error",
                            heightAuto: false
                        });
                    }
                }
            });
        });

</script>
</body>
</html>
 
