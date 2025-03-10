<?php
    include_once "header.php";
?>

<h2>Student List</h2>

<ul class="studentList">
    <?php 
        $controller = new StudentController();
        $students = $controller->index();
        if ($students && $students->num_rows > 0): ?>
        <?php while($student = $students->fetch_assoc()): ?>
            <li><?php echo $student['name'] . " - " . $student['id'] . " - " . $student['email']; ?></li>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                <button type="submit"name="delete_student">Delete</button>
            </form>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>