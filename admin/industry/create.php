<?php
include '../../include/topscripts.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../../include/head.php';
        ?>
    </head>
    <body>
        <?php
        include '../include/header.php';
        ?>
        <ul class="breadcrumb">
            <li><a href="<?=APPLICATION ?>/">На главную</a></li>
            <li><a href="<?=APPLICATION ?>/admin/">Администратор</a></li>
            <li>Области</li>
        </ul>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex justify-content-between mb-2">
                        <div><h1>Новая область</h1></div>
                        <div><a href="index.php" class="btn btn-outline-dark"><i class="fas fa-undo-alt"></i>&nbsp;Отмена</a></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
