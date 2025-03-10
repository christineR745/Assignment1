<?php
    include_once "header.php";

    $error = "";

    if(is_logged_in()){ redirect("dashboard.php"); }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(user_exists_email($conn, $email)){
            $error = "An account with this email already exists";
        }
        else{

            // encrypt password for security
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (password, email) VALUES ('$passwordHashed', '$email')";

            if(mysqli_query($conn, $sql)){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                redirect("dashboard.php");
            }
            else{
                $error = "Something went wrong while trying to register.";
            }
        }
    }
?>

<div class="wrapper">
<div class="container">
    <h2>Sign Up</h2>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="text" name="password" required>
        </div>
        <button type="submit">Sign Up</button>
    </form>

    <h4>Already have an account? <a href="login.php">Login</a></h4>
    
    <!-- display errors here -->
    <p style="color:red"> <?php echo $error ?>  </p>
</div>
</div>

<?php
    include "footer.php";

    mysqli_close($conn);
?>