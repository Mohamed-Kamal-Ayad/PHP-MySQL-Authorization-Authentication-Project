<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if(isset($_POST['insdep']))
{
    $name = $_POST['depName'];
    $insert = "INSERT INTO departments VALUES(NULL, '$name')";
    $i = mysqli_query($connection, $insert);
    testMessage($connection, "Create Department");
}
auth(1);
?>
<h1 class="text-center"> Add Department </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" name="depName" required>
                </div>
                    <button type="submit" name="insdep" class="btn btn-primary mt-2">Create Department</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>
