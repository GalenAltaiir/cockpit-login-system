<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyApp | Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- intelligent telephone input  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
        <p class="fs-2 p-1 text-center card-header mb-4">Create an Account</p>
        <form action="" method="POST">
            <p class="text-center text-danger" id="form-top"></p>
            <div class="row g-3 justify-content-center">

                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                        required>
                </div>

                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        aria-label="Password" required>
                </div>

                <div class=" col-sm-12 col-md-12 col-lg-12">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail Address"
                        aria-label="E-Mail Address" required>
                </div>

                <div class=" col-sm-6 col-md-6 col-lg-6">
                    <input type="text" name="name" class="form-control" placeholder="First Name" aria-label="Name"
                        required>
                </div>

                <div class=" col-sm-6 col-md-6 col-lg-6">
                    <input type="text" name="surname" class="form-control" placeholder="Surname" aria-label="Surname"
                        required>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12" style="display: block !important;">
                    <input type="tel" id="phone" name="mobile" class="form-control" placeholder="Phone Number"
                        aria-label="mobile" required style="width: 100%;">
                </div>

                <div class="col-sm-8 col-md-8 col-lg-7">
                    <button name="submit" type="submit" class="btn btn-primary col-12 fs-4">Create Account</button>
                </div>

                <div class="row g-2 col-sm-8 col-md-8 col-lg-7 card-footer">
                    <a href="index.php" class="col text-center text-decoration-none">Already Registered?</a>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
<script>
const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
</script>

<?php
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
?>
<script>
fetch('http://localhost/Experiments/cockpit-login-system/cockpit-master/api/collections/save/users?token=0a39c10de8327ccade80657177c8f2', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            data: {
                "username": "<?php echo $user; ?>",
                "password": "<?php echo $pass; ?>",
                "name": "<?php echo $name; ?>",
                "surname": "<?php echo $surname; ?>",
                "phone": "<?php echo $mobile; ?>",
                "email": "<?php echo $email; ?>"
            }
        })
    })
    .then(res => res.json())
    .then(entry => console.log(entry));
</script>
<?php
    header("location: index.php");
}
?>







</html>