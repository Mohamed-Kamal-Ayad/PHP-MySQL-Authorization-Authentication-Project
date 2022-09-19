<?php
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';


?>

<div class="container-fluid col-md-6 text-center">
    <div class="card">
        <div class="card-body">

            <form method="GET" class="form-inline  my-2 my-lg-0">
                <input class="form-control mr-sm-2" name = "searchName" type="search" placeholder="Search" aria-label="Search">
                <input type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="search">
            </form>
            <?php if (isset($_GET['searchName'])) : ?>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th> ID </th>
                    <th> Employee Name</th>
                    <th> Action</th>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($selectName as $data) : ?>
                    <tr>
                        <td><?= $data['ID']; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td>
                            <div class="dropdown">
                                <i type="button" data-toggle="dropdown" aria-expanded="false" class="fa-solid btn btn-light fa-ellipsis-vertical"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-info" href="/authproject/employees/show.php?show=<?= $data['ID'] ?>"><i class="fa-solid fa-eye"></i></a>
                                    <a class="dropdown-item text-primary" href="/authproject/employees/update.php?edit=<?= $data['ID'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="dropdown-item text-danger" href="/authproject/employees/list.php?delete=<?= $data['ID'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include '../shared/footer.php'; ?>

