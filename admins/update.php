<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

$select = "SELECT * FROM roles";
$roles = mysqli_query($connection, $select);


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM admins WHERE ID = $id";
    $admin = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($admin);
    if (isset($_POST['update'])) {
        if (sha1($_POST['oldpassword']) == $row['password']) {
            $name = $_POST['username'];
            $password = sha1($_POST['newpassword']);
            $role = $_POST['role'];

            if (empty($_FILES['image']['name'])) {
                $location = $row['image'];
            } else {
                $image_name = time() . $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $location = "./upload/" . $image_name;
                move_uploaded_file($tmp_name, $location);
            }

            $update = "UPDATE admins SET ID = $id, `userName` = '$name', password = '$password' , image = '$location' WHERE ID = $id";
            $u = mysqli_query($connection, $update);
            testMessage($u, "Update Admin");
            header("location:list.php#?return");
        } else {
            echo "<div class='alert alert-danger col-4 mx-auto'>
            Wrong Old password!
            </div>";
        }
    }
}
auth(1, $_SESSION['adminID']);
?>
<h1 class="text-center"> Update Admin Data </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" value="<?= $row['userName'] ?>" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="newpassword" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label for="role">Admin role</label>
                        <select class="custom-select mr-sm-2" name="role">
                            <option selected>Choose Admin role</option>
                            <?php foreach ($roles as $data) : ?>
                            <option value="<?= $data['ID']; ?>">
                                <?= $data['description']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="update" class="btn btn-primary mt-2">Update Data</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>