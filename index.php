<?php
include './shared/header.php';
include './shared/nav.php';
?>

<div class="home ">
    <h1 class="pt-5 display-1 text-center"> Welocme At Home Page <?php if(isset($_SESSION['adminName'])) echo "<br>" . $_SESSION['adminName'];?> </h1>
</div>

<?php include './shared/footer.php'; ?>
