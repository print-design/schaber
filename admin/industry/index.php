<?php
include '../../include/topscripts.php';

// Получение данных
$sql = "select id, name, parent_id from industry order by name";
$grabber = new Grabber($sql);
$error_message = $grabber->error;

$industries = array();
if(empty($error_message)) {
    $industries = $grabber->result;
}
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
        include './breadcrumb.php';
        ?>
        <div class="container-fluid">
            <?php
            if(!empty($error_message)) {
               echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="d-flex justify-content-between mb-2">
                        <div><h1>Области</h1></div>
                        <div><a href="create.php" class="btn btn-outline-dark"><i class="fas fa-plus"></i>&nbsp;Новая область</a></div>
                    </div>
                    <?php foreach($industries as $row): ?>
                    <p><a href="details.php?id=<?=$row['id'] ?>"><?=$row['name'] ?></a></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        include '../../include/footer.php';
        ?>
    </body>
</html>