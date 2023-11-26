<?php
    include 'includes/header.php';
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $checkQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = $conn->query($checkQuery);

        if($checkResult->num_rows > 0)
        {
            echo "<p style='color:red;'> Error: Username already exists. </p>";
        }
        else
        {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $result = $conn->query($sql);

            if ($result) {
                header("Location:login.php");
                exit();
                //echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

?>

<h2>Register</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="register.php" method="post">
                <div class="form-outline mb-4">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Insert a Username" required>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Insert a Password" required>
                </div>
                <div>
                    <input type="submit" value="Register" class="btn btn-primary btn-block mb-4">
                </div>
            </form>
        </div>
    </div>
</div>







<?php

  include 'includes/footer.php'; 

  ?>

</div>
</form>


