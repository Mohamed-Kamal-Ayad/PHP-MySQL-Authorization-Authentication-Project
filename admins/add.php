<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if (isset($_POST['add'])) {
    $name = $_POST['username'];
    $password = sha1($_POST['password']);
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_name;
    move_uploaded_file($tmp_name, $location);
    $role = $_POST['role'];
    $insert = "INSERT INTO `admins`(`ID`, `userName`, `password`, `image`, `role`) VALUES (NULL,'$name','$password','$location','$role')";
    $s = mysqli_query($connection, $insert);
    testMessage($s, "Insert Admin");
    header("location:list.php#?return");
}
$select = "SELECT * FROM `roles`";
$roles = mysqli_query($connection, $select);
auth(1);
?>
<h1 class="text-center"> Add Admin </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" required>
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
                <button type="submit" name="add" class="btn btn-primary mt-2">Add Admin</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>