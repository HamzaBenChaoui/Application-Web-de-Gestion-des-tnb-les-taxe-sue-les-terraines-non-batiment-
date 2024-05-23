<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
    <link rel="stylesheet" href="styles/main.css"/>
    <link rel="stylesheet" href="styles/bootstrap.css"/>
    <script src="styles/bootstrap.bundle.js"></script>
    <style>
        /* Ajoutez votre style ici si nécessaire */
        .password-input {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="register">
        <div class="container py-3">
            <h2 class="text-center mb-4">User Login</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="connect_us.php" method="post" class="d-flex flex-column gap-4">
                        <!-- username field  -->
                        <div class="form-outline">
                            <label for="user_username" class="form-label">CIN</label>
                            <input type="text" placeholder="Enter your username" autocomplete="off" required="required" name="user_username" id="user_username" class="form-control">
                        </div>
                        <!-- password field  -->
                        <div class="form-outline password-input">
                            <label for="user_password" class="form-label">Titre Foncier</label>
                            <input type="password" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" id="user_password" class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-primary mb-2" name="user_login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
