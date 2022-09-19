<?php
session_start();
if(isset($_GET['logout']))
{
    session_unset();
    session_destroy();
    header('location:/authproject/auth/login.php');
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/authproject/index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <?php if(isset($_SESSION['adminID'])) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/authproject/employees/add.php">Add Employees</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/authproject/employees/list.php">Employees's List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Departments
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/authproject/departments/add.php">Create New</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/authproject/departments/list.php">Departments's List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Admins
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/authproject/admins/add.php">Add admin</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/authproject/admins/list.php">Admins List</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="/authproject/admins/profile.php" class="nav-link">Profile</a>
            </li>
            <?php endif; ?>
        </ul>

        <?php if (isset($_SESSION['adminID'])) : ?>
        <form class="form-inline ml-2 my-2 my-lg-0" method="GET">
            <button name="logout" class="btn btn-danger"> Log Out </button>
        </form>
        <?php else: ?>
        <form class="form-inline ml-2 my-2 my-lg-0">
            <a href="/authproject/auth/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
        </form>
        <?php endif; ?>
    </div>
</nav>


