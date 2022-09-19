<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM departments WHERE ID = $id";
    $department = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($department);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];

        $update = "UPDATE departments SET ID = $id, `departmentName` = '$name' WHERE ID = $id";
        $u = mysqli_query($connection, $update);
        testMessage($u, "Update Department");
    }
}
auth(1);
?>
<h1 class="text-center">Update Department </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" value="<?= $row['departmentName'];?>" name="depName" required>
                </div>
                <button type="submit" name="update" class="btn btn-info mt-2">Update Department</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>
