<?php
    include "view/StudentView.php";

    if(!is_logged_in()) { redirect("login.php"); }
?>

<div class="wrapper">
<div class="container">
    <h2>Create New Student</h2>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>
        </div>
        <div class="form-group">
            <label for="studentID">Student ID:</label>
            <input type="text" id="studentID" name="studentID" required>
        </div>
        <div class="form-group">
            <label for="studentEmail">Student Email:</label>
            <input type="email" id="studentEmail" name="studentEmail" required>
        </div>
        <button type="submit" name="add_student">Add Student</button>
    </form>
</div>
</div>

<?php include "footer.php"; ?>