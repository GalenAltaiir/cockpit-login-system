<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>MyApp Login</title>
</head>

<body class="bg-dark text-white">
    <div class="container-fluid bg-primary">
        <div class="row position-relative h-100">
            <div class="col-sm-12 text-center h-100">
                <h1>My App</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-5 col-xxl-4 container mt-5 card text-dark p-3 pb-3 ">
        <p class="fs-2 p-1 text-center card-header mb-4">Login To My App</p>
        <form action="" method="POST">
            <p class="text-center text-danger" id="form-top"></p>
            <div class="row g-3 justify-content-center">
                <div class=" col-sm-8 col-md-8 col-lg-7">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                        required>
                </div>
                <div class=" col-sm-8 col-md-8 col-lg-7">
                    <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Password"
                        required>
                </div>

                <div class="col-sm-8 col-md-8 col-lg-7">
                    <button name="submit" type="submit" class="btn btn-primary col-12 fs-4">Log in</button>
                </div>

                <div class="row g-2 col-sm-8 col-md-8 col-lg-7 ">
                    <a href="#" class="col text-center text-decoration-none">Forgot Password?</a>
                </div>

                <div class="row g-2 col-sm-8 col-md-8 col-lg-7 card-footer">
                    <a href="register.php" class="btn btn-success btn-lg col text-center">Create Account</a>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



    <?php

    // fetch all user data
    require "config/get_users.php";
    $data = getUsers();
    $i = 0;
    $user_db = $data["entries"][$i]["username"];
    $pass_db = $data["entries"][$i]["password"];

    // start session
    session_start();

    // check if user is already logged in
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: home.php");
        exit;
    }

    // if login is attempted
    if (isset($_POST['submit'])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        // Set usernames strings to lowercase
        $user = strtolower($user);
        $user_db = strtolower($user_db);


        $size = count($data["entries"]);

        while ($i < $size) {
            $i++;

            if ($user == $user_db && $pass == $pass_db) {
                $_SESSION["loggedin"] = true;
                header("location: welcome.php");
            } else if ($user !== $user_db || $pass !== $pass_db) {
                echo "<script src = 'js/log-err.js'></script>";
            }
        }
    }


    ?>
</body>

</html>