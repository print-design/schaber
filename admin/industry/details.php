<?php
include '../../include/topscripts.php';

$id = filter_input(INPUT_GET, 'id');

// Получение объекта
$name = '';
$parent = '';

$sql = "select i.name, p.name parent from industry i left join industry p on i.parent_id = p.id where i.id = $id";
$fetcher = new Fetcher($sql);

if($row = $fetcher->Fetch()) {
    $name = $row['name'];
    $parent = $row['parent'];
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
                        <div><h1><?=$name ?></h1></div>
                        <div><a href="index.php" class="btn btn-outline-dark"><i class="fas fa-list"></i>&nbsp;К списку</a></div>
                    </div>
                    <?php if(!empty($parent)): ?>
                    <p><?=$parent ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>