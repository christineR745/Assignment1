<?php
    include_once "header.php";

    $error = "";

    if(is_logged_in()){ redirect("dashboard.php"); }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(user_exists_email($conn, $email)){
            $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            if(password_verify($password, $user['password'])){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                redirect("dashboard.php");             
            }
            else{
                $error = "Invalid email or password";
            }
        }
        else{
            $error = "Invalid email or password";
        }
    }
?>

<div class="wrapper">
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="text" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>

    <h4>Don't have an account? <a href="register.php">Register here</a></h4>

    <!-- display errors here -->
    <p style="color:red"> <?php echo $error ?>  </p>
</div>
</div>

<?php
    include "footer.php";
?>