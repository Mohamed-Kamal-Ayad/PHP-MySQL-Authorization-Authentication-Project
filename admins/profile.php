<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';
if (true) {
    $id = $_SESSION['adminID'];
    $select = "SELECT * FROM admins where ID = $id";
    $admin = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($admin);
}
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM admins where ID = $id";
    $admin = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($admin);
}
auth($_SESSION['adminRole']);
?>
<h1 class="text-center">Your Profile</h1>
<div class="container-fluid col-md-4 text-center">
    <div class="card">
        <img src="/authproject/admins<?= $row['image'] ?>" class="card-img-top" alt="">
        <div class="card-body">
            <h1>Name: <?= $row['userName']; ?></h1>
            <h1>Role: <?= $row['role']; ?></h1>
            <a href="/authproject/admins/update.php?edit=<?= $row['ID']; ?>"><button
                    class="btn btn-info col-md-3">Edit</button></a>
        </div>
    </div>
</div>

<?php include '../shared/footer.php'; ?>