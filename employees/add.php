<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $city = $_POST['city'];
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_name;
    move_uploaded_file($tmp_name, $location);
    $department = $_POST['department'];
    $insert = "INSERT INTO employees(`name`, email, salary, city, departmentID, image) VALUES('$name', '$email', $salary, '$city', $department, '$location')";
    $s = mysqli_query($connection, $insert);
    testMessage($s, "Insert employee" );
}
$select = "SELECT * FROM departments";
$departments = mysqli_query($connection, $select);
auth(1,2);

?>
<h1 class="text-center"> Add Employee </h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" name="salary" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label for="department">Employee's department</label>
                        <select class="custom-select mr-sm-2" name="department">
                            <option selected>Choose employee's department</option>
                            <?php foreach ($departments as $departmentData) : ?>
                                <option value="<?= $departmentData['ID']; ?>">
                                    <?= $departmentData['departmentName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                    <button type="submit" name="insert" class="btn btn-primary mt-2">Insert Employee</button>
            </form>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>

