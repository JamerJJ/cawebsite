<?php
session_start();
include('includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // successful
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        // failed
        $login_error = "Invalid username or password.";
    }
}
?>

<?php
    if (isset($login_error)) {
        echo "<p style='color:red;'>$login_error</p>";
    }
    ?>


<h2>Login</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="login.php" method="post">
                <div class="form-outline mb-4">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Insert a Username" required>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Insert a Password" required>
                </div>
                <div>
                    <input type="submit" value="Login" class="btn btn-primary btn-block mb-4">
                </div>
            </form>
        </div>
    </div>
</div>



<?php
    include 'includes/footer.php';
?>