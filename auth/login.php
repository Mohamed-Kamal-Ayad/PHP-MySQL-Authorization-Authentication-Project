<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = sha1($_POST['password']);
    $select = "SELECT * FROM admins where userName = '$name' and `password` = '$password'";
    $admin = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($admin);
    $count = mysqli_num_rows($admin);
    if($count == 1)
    {
        $_SESSION['adminID'] = $row['ID'];
        $_SESSION['adminName'] = $row['userName'];
        $_SESSION['adminRole'] = $row['role'];
        header("location: /authproject/");
    }
    else
    {
        echo "<div class='alert alert-danger col-4 mx-auto'>
        Wrong Data
        </div>";
    }
}
?>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary mt-2">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>

