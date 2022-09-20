<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';
$select = "SELECT * FROM empdep";
$departments = mysqli_query($connection, $select);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE * FROM departments where ID = $id";
    $d = mysqli_query($connection, $delete);
    testMessage($d, "Delete Department");
    header("location:list.php#?return");
}
auth(1, 2, 3);

?>
<h1 class="text-center">Departments's List</h1>

<div class="container-fluid col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <table id="return" class="table table-dark">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Department Name</th>
                        <th>Number of Employees</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departments as $data) : ?>
                    <tr>
                        <td><?= $data['ID']; ?></td>
                        <td><?= $data['Department Name']; ?></td>
                        <td><?= $data['Number of Employees']; ?></td>
                        <td>
                            <?php if ($_SESSION['adminID'] == 1) : ?>
                            <div class="dropdown">
                                <i type="button" data-toggle="dropdown" aria-expanded="false"
                                    class="fa-solid btn btn-light fa-ellipsis-vertical"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary"
                                        href="/authproject/departments/update.php?edit=<?= $data['ID'] ?>"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="dropdown-item text-danger"
                                        href="/authproject/departments/list.php?delete=<?= $data['ID'] ?>"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                            <?php else : echo '<p style="color:red">No Access</p>' ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>