<?php
include '../include/topscripts.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../include/head.php';
        ?>
    </head>
    <body>
        <?php
        include 'include/header.php';
        ?>
        <ul class="breadcrumb">
            <li><a href="<?=APPLICATION ?>/">На главную</a></li>
            <li>Администратор</li>
        </ul>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
            <h1>Администратор</h1>
            <p><a href="<?=APPLICATION ?>/admin/industry/">Области</a></p>
        </div>
        <?php
        include '../include/footer.php';
        ?>
    </body>
</html>