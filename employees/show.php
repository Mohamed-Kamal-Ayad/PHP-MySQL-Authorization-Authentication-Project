<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
if(isset($_GET['show']))
    {
        $id = $_GET['show'];
        $select = "SELECT * FROM employeesjoindepartment WHERE empID = $id";
        $emp = mysqli_query($connection, $select);
        $row =  mysqli_fetch_assoc($emp);
    }
auth(1,2);
?>
<h2 class="text-center"> Show Employee : <?= $row['empName'] ?> </h2>

<div class="container-fluid col-md-3 text-center">
    <div class="card">
        <img src="/authproject/employees/<?= $row['empImage'] ?>" class="card-img-top" alt="">
        <div class="card-body">
            <p>Name: <?= $row['empName']; ?></p>
            <p>Email: <?= $row['email']; ?></p>
            <p>Salary: <?= $row['salary']; ?></p>
            <p>City: <?= $row['city']; ?></p>
            <p>Department: <?= $row['departmentName']; ?></p>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>

