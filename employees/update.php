<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM employees WHERE ID = $id";
    $employee = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($employee);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $city = $_POST['city'];
        $department = $_POST['department'];

        if (empty($_FILES['image']['name'])) {
            $location = $row['image'];
        } else {
            $image_name = time() . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $location = "./upload/" . $image_name;
            move_uploaded_file($tmp_name, $location);
        }

        $update = "UPDATE employees SET ID = $id, `name` = '$name', email = '$email', salary = $salary, city='$city', departmentID = $department, image = '$location' WHERE ID = $id";
        $u = mysqli_query($connection, $update);
        header("location:list.php?#return");
        testMessage($u, "Update employee");
    }
}
$select = "SELECT * FROM departments";
$departments = mysqli_query($connection, $select);
auth(1, 2);
?>
<h1 class="text-center"> Upadate Employee </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?= $row['name'] ?>" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="<?= $row['email'] ?>" name="email" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" value="<?= $row['salary'] ?>" name="salary" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" value="<?= $row['city'] ?>" name="city" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label for="department">Employee's department</label>
                        <select class="custom-select mr-sm-2" name="department" required>
                            <option selected>Choose employee's department</option>
                            <?php foreach ($departments as $departmentData) : ?>
                            <option value="<?= $departmentData['ID']; ?>">
                                <?= $departmentData['departmentName']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-2" name="update">Update Data</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>