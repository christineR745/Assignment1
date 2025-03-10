<nav>
    <ul>
        <li>
            <a href="dashboard.php">Dashboard</a>
        </li>
        <li>
            <a href="register.php">Register</a>
        </li>
        <li>   
            <?php if(is_logged_in()): ?>            
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </li>
        <!-- <li>
            <a href="logout.php">Logout</a>
        </li> -->
    </ul>
</nav>